<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function index()
    {
        $kategori = kategori::get();
        return view('admin.kategori.kategori', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi',
        ]);

        kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect('/kategori')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' =>'required',
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi',
        ]);

        kategori::findOrFail($id)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect('/kategori')->with('success', 'Data berhasil diperbaharui');
    }

    public function destroy($id)
    {
        kategori::findOrFail($id)->delete();
        return redirect('/kategori')->with('success', 'Data berhasil dihapus');
    }
}
