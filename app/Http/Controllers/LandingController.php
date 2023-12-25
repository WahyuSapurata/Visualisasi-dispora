<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function demografi()
    {
        return view('landing.index');
    }

    public function pendidikan()
    {
        return view('landing.pendidikan');
    }

    public function pekerjaan()
    {
        return view('landing.pekerjaan');
    }

    public function status()
    {
        return view('landing.status');
    }

    public function teknologi()
    {
        return view('landing.teknologi');
    }

    public function kecamatan()
    {
        return view('landing.kecamatan');
    }
}
