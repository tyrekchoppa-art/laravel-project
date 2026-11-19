<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        $title = "About";
        $nama = "Nama:Muhammad Alfarrold";
        $kelas = "Kelas: 11 PPLG 1";
        $repo = "GitH: TyreekChoppa";

        return view('admin.about', [
            'title' => $title,
            'nama' => $nama,
            'kelas' => $kelas,
            'repo' => $repo
        ]);
    }
}
