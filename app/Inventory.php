<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

	protected $table = 'inventory';

    public function komoditas()
    {
    	return $this->belongsTo('App\Komoditas','komoditas_id', 'id_komoditas');
    }

    public function toko()
    {
    	return $this->belongsTo('App\User','toko_id', 'id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User','created_by', 'id');
    }
}
