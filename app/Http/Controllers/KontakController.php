<?php

namespace App\Http\Controllers;

use App\Models\ContactSetting;
use App\Models\FaqsModel;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $contactSet = ContactSetting::where('is_active', true)->first();
        $Faqs = FaqsModel::where('is_active', true)->latest()->get();

        $data = [
            'title' => 'Kontak | Fakultas Ilmu Komputer',
            'navlink' => 'Kontak',
            'ContactSet' => $contactSet,
            'FaqsData' => $Faqs
        ];

        return view('pages.kontak', $data);
    }
}
