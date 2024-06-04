<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'email',
        'gender',
        'tgl_datang',
        'is_active',
    ];
}