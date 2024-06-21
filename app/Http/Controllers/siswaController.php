<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class siswaController extends Controller
{
    public function index()
    {
        $siswa = siswa::get();
        return view('admin.siswa.siswa', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'kelas_siswa' => 'required',
            'domisili_siswa' => 'required',
        ], [
            'nama_siswa.required' => 'Nama siswa harus diisi',
            'kelas_siswa.required' => 'Kelas siswa harus diisi',
            'domisili_siswa.required' => 'domisili siswa harus diisi',
        ]);

        siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'kelas_siswa' => $request->kelas_siswa,
            'domisili_siswa' => $request->domisili_siswa,
        ]);

        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'kelas_siswa' => 'required',
            'domisili_siswa' => 'required',
        ], [
            'nama_siswa.required' => 'Nama siswa harus diisi',
            'kelas_siswa.required' => 'Kelas siswa harus diisi',
            'domisili_siswa.required' => 'domisili siswa harus diisi',
        ]);

        siswa::findOrFail($id)->update([
            'nama_siswa' => $request->nama_siswa,
            'kelas_siswa' => $request->kelas_siswa,
            'domisili_siswa' => $request->domisili_siswa,
        ]);

        return redirect('/siswa')->with('success', 'Data berhasil diperbaharui');
    }

    public function destroy($id)
    {
        siswa::findOrFail($id)->delete();
        return redirect('/siswa')->with('success', 'Data berhasil dihapus');
    }
}
