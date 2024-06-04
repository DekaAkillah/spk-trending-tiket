<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $fillable = ['nama_event','tanggal_event','lokasi_event','harga_tiket','rating','jumlah_pengunjung_hal','tiket_terjual'];
}
