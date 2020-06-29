<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Komoditas extends Model
{
    use Notifiable;

    protected $guard = 'admin';
    protected $table = 'komoditas';

    protected $fillable = [
        'nama_komoditas', 'jenis', 'harga', 'stok','img_komoditas'
    ];

    protected $hidden = ['password'];
}
