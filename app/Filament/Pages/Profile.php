<?php

namespace App\Filament\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Facades\Filament;
use Filament\Pages\Page;

use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

use Filament\Schemas\Schema;

use Filament\Forms\Components\TextInput;

use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Hash;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.pages.profile';
    protected static bool $shouldRegisterNavigation = false;

    public ?array $data = [];

    public function mount(): void
    {
        $user = Filament::auth()->user();

        $this->form->fill([
            'name'  => $user->name,
            'email' => $user->email,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Pribadi')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                    ]),

                Section::make('Ganti Password')
                    ->schema([
                        TextInput::make('password')
                            ->password()
                            ->revealable() // 👁️ ikon mata
                            ->label('Password Baru')
                            ->placeholder('Masukan password baru')
                            ->minLength(8)
                            ->dehydrated(fn($state) => filled($state))
                            ->dehydrateStateUsing(
                                fn($state) => filled($state) ? Hash::make($state) : null
                            ),


                        TextInput::make('password_confirmation')
                            ->password()
                            ->revealable() // 👁️ ikon mata
                            ->label('Konfirmasi Password')
                            ->placeholder('Konfirmasi password')
                            ->same('password')
                            ->dehydrated(false),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $user = Filament::auth()->user();
        $state = $this->form->getState();

        $passwordChanged = ! empty($state['password']);

        $user->name  = $state['name'];
        $user->email = $state['email'];

        if ($passwordChanged) {
            $user->password = $state['password']; // sudah hash
        }

        $user->save();

        if ($passwordChanged) {
            // ✅ pakai guard panel Filament
            $guard = Filament::getCurrentPanel()->getAuthGuard() ?? config('auth.defaults.guard');

            auth()->guard($guard)->login($user);

            // ✅ ini kuncinya biar AuthenticateSession gak nge-logout lagi
            request()->session()->put('password_hash_' . $guard, $user->getAuthPassword());

            request()->session()->regenerate();
        }

        Notification::make()
            ->title('Profile berhasil diupdate')
            ->success()
            ->send();

        $this->redirect(\App\Filament\Pages\Dashboard::getUrl(), navigate: true);
    }
}
