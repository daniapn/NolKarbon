<?php

namespace App\Http\Controllers;

use App\Models\DraftArtikel;
use Illuminate\Http\Request;

class KontributorController extends Controller
{
    public function index()
    {
        $artikels = DraftArtikel::all(); // ambil semua artikel
        return view('Kontributor/HalamanUtamaKontributor', compact('artikels'));
    }

    public function editDraft($id)
{
    $artikel = DraftArtikel::findOrFail($id);
    return view('Kontributor/EditDraftArtikel', compact('artikel'));
}

}
