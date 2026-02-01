<?php

namespace App\Providers;

use App\Models\ChatWaModel;
use App\Models\NavlinkModal;
use App\Models\ProgramStudiModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with(
                'navProdi',
                ProgramStudiModel::where('aktif', true)
                    ->orderBy('nama_program_studi')
                    ->get()
            );
        });

        View::composer('*', function ($view) {
            $view->with(
                'navs',
                NavlinkModal::active()
                    ->ordered()
                    ->get()
                    ->groupBy('group_key')
            );
        });
        // chetwamodel
        View::share('Chat', ChatWaModel::where('is_active', true)->first());
    }
}
