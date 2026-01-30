<?php

namespace App\Http\Controllers;

use App\Models\ContactSetting;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $contactSet = ContactSetting::where('is_active', true)->first();

        $data = [
            'title' => 'Kontak | Fakultas Ilmu Komputer',
            'navlink' => 'Kontak',
            'ContactSet' => $contactSet,
        ];

        return view('pages.kontak', $data);
    }
}
