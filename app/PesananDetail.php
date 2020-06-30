<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    public function komoditas()
    {
    	return $this->belongsTo('App\Komoditas','komoditas_id', 'id_komoditas');
    }

    public function pesanan(){
    	return $this->belongsTo('App\Pesanan','pesanan_id','id');
    }
}
