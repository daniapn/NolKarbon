<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DraftArtikel;

class HomeController extends Controller
{
    public function index()
{
    // Ambil semua artikel yang sudah publish
    $articles = DraftArtikel::where('status', 'published')
                    ->orderBy('tanggalDibuat', 'desc')
                    ->get();

    return view('HalamanUtama', compact('articles'));
}

    public function show($id)
{
    $article = DraftArtikel::where('idDraft', $id)->where('status', 'published')->firstOrFail();
    return view('ArtikelDetail', compact('article'));
}
public function index2()
{
    // Ambil semua artikel yang sudah publish
    $articles = DraftArtikel::where('status', 'published')
                    ->orderBy('tanggalDibuat', 'desc')
                    ->get();

    return view('HalamanUtamaPengguna', compact('articles'));
}

}
