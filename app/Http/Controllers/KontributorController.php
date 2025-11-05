<?php

namespace App\Http\Controllers;

use App\Models\DraftArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KontributorController extends Controller
{
    public function index()
    {
        $artikels = DraftArtikel::orderBy('tanggalDibuat', 'desc')->get();
        return view('Kontributor.HalamanUtamaKontributor', compact('artikels'));
    }

    public function editDraft($id)
    {
        $artikel = DraftArtikel::findOrFail($id);
        return view('Kontributor.EditDraftArtikel', compact('artikel'));
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

    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('artikel', 'public');
        $draft->gambar = $path;
    }

    // ✅ Simpan waktu update
    $draft->tanggalUpdate = now();

    $draft->save();

    return redirect()
        ->route('kontributor.index')
        ->with('success', 'Draft berhasil disimpan!');
}


    public function deleteDraft($id)
    {
        $draft = DraftArtikel::findOrFail($id);

        if ($draft->gambar && Storage::disk('public')->exists($draft->gambar)) {
            Storage::disk('public')->delete($draft->gambar);
        }

        $draft->delete();

        return redirect()->route('kontributor.index')
            ->with('success', 'Draft berhasil dihapus!');
    }

public function submitDraft($id)
{
    $draft = DraftArtikel::findOrFail($id);

    $draft->status = 'menunggu review';
    
    // ✅ Simpan waktu update juga
    $draft->tanggalUpdate = now();

    $draft->save();

    return redirect()->route('kontributor.index')
        ->with('success', 'Draft berhasil dikirim untuk review!');
}

}
