<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // Tentukan jika ada nama tabel yang berbeda (misal: 'items_table' jika bukan 'items')
    protected $table = 'items'; // Sesuaikan dengan nama tabel Anda jika perlu

    // Tentukan kolom yang bisa diisi massal
    protected $fillable = ['nama']; // Sesuaikan dengan kolom yang ada di tabel Anda
}
