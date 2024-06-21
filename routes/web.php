<?php

use App\Http\Controllers\beritaController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\siswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(kategoriController::class)->group(function(){
    Route::get('/kategori', 'index')->name('kategori');
    Route::get('/kategori-create', 'create')->name('kategori.create');
    Route::post('/kategori-store', 'store')->name('kategori.perform');
    Route::get('/kategori-edit/{id}', 'edit')->name('kategori.edit');
    Route::put('/kategori-update/{id}', 'update')->name('kategori.update');
    Route::delete('/kategori-delete/{id}', 'destroy')->name('kategori.delete');
});

Route::controller(siswaController::class)->group(function(){
    Route::get('/siswa', 'index')->name('siswa');
    Route::get('/siswa-create', 'create')->name('siswa.create');
    Route::post('/siswa-store', 'store')->name('siswa.perform');
    Route::get('/siswa-edit/{id}', 'edit')->name('siswa.edit');
    Route::put('/siswa-update/{id}', 'update')->name('siswa.update');
    Route::delete('/siswa-delete/{id}', 'destroy')->name('siswa.delete');
});

Route::controller(beritaController::class)->group(function(){
    Route::get('/berita', 'index')->name('berita');
    Route::get('/berita-create', 'create')->name('berita.create');
    Route::post('/berita-store', 'store')->name('berita.perform');
    Route::get('/berita-edit/{id}', 'edit')->name('berita.edit');
    Route::put('/berita-update/{id}', 'update')->name('berita.update');
    Route::delete('/berita-delete/{id}', 'destroy')->name('berita.delete');
});
