<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlamatAntar extends Model
{
    protected $fillable = [
        'kecamatan', 'kelurahan', 'alamat', 'pesanan_id'
    ];
}
