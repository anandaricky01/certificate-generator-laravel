<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'pesan'
    ];
}
