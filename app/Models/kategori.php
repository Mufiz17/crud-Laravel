<?php

namespace App\Models;


use App\Models\berita;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = ['nama_kategori'];

    public function berita()
    {
        return $this->hasMany(berita::class);
    }
}
