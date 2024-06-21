<?php

namespace App\Models;

use App\Models\kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $fillable = ['judul_berita', 'isi_berita', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
}
