<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','telepon','kecamatan','kelurahan','alamat','password','ktp','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pesanan(){
        return $this->hasMany('App\Pesenan','id','user_id');
    }

    public function pesanantoko(){
        return $this->hasMany('App\Pesenan','id','toko_id');
    }

    public function barangmasuk(){
        return $this->hasMany('App\BarangMasuk','id','user_id');
    }

    public function barangmasuktoko(){
        return $this->hasMany('App\BarangMasuk','id','toko_id');
    }

    public function inventoryadmin(){
        return $this->hasMany('App\Inventory','id','created_by');
    }

    public function inventorytoko(){
        return $this->hasMany('App\Inventory','id','toko_id');
    }
}
