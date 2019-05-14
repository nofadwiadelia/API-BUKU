<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillabel = ['judul', 'gambar', 'penulis', 'tahun', 'penerbit', 'kategori'];
}
