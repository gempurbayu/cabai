<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{

	protected $table = 'barangmasuk';

    public function user()
    {
    	return $this->belongsTo('App\User','user_id', 'id');
    }

    public function komoditas()
    {
    	return $this->belongsTo('App\Komoditas','komoditas_id', 'id_komoditas');
    }

    public function toko()
    {
    	return $this->belongsTo('App\User','toko_id', 'id');
    }
}
