<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\kategori;
use Illuminate\Http\Request;

class beritaController extends Controller
{
    public function index()
    {
        $berita = berita::get();
        $kategori = kategori::get();
        return view('admin.berita.berita', compact('berita', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_berita' => 'required',
            'kategori_id' => 'required',
            'isi_berita' => 'required',
        ], [
            'judul_berita.required' => 'Nama berita harus diisi',
            'kategori_id.required' => 'Kategori berita harus diisi',
            'isi_berita.required' => 'Isi berita harus diisi',
        ]);

        berita::create([
            'judul_berita' => $request->judul_berita,
            'kategori_id' => $request->kategori_id,
            'isi_berita' => $request->isi_berita,
        ]);

        return redirect('/berita')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_berita' => 'required',
            'kategori_id' => 'required',
            'isi_berita' => 'required',
        ], [
            'judul_berita.required' => 'Nama berita harus diisi',
            'kategori_id.required' => 'kategori berita harus diisi',
            'isi_berita.required' => 'isi berita harus diisi',
            ]);

        berita::findOrFail($id)->update([
            'judul_berita' => $request->judul_berita,
            'kategori_id' => $request->kategori_id,
            'isi_berita' => $request->isi_berita,
            ]);

        return redirect('/berita')->with('success', 'Data berhasil diperbaharui');
    }

    public function destroy($id)
    {
        berita::findOrFail($id)->delete();
        return redirect('/berita')->with('success', 'Data berhasil dihapus');
    }
}
