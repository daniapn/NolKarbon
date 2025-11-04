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

public function updateDraft(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string',
            'isi' => 'required|string',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $draft = DraftArtikel::findOrFail($id);
        $draft->judul = $request->judul;
        $draft->isi = $request->isi;

        // upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('artikel', 'public');
            $draft->gambar = $path;
        }

        $draft->save();

        return redirect()->route('kontributor.index')
            ->with('success', 'Draft berhasil diperbarui!');
    }

    public function deleteDraft($id)
    {
        $draft = DraftArtikel::findOrFail($id);
        $draft->delete();

        return redirect()->route('kontributor.index')
            ->with('success', 'Draft berhasil dihapus!');
    }

    public function submitDraft($id)
    {
        $draft = DraftArtikel::findOrFail($id);
        $draft->status = 'menunggu review';
        $draft->save();

        return redirect()->route('kontributor.index')
            ->with('success', 'Draft berhasil dikirim untuk review!');
    }
}
