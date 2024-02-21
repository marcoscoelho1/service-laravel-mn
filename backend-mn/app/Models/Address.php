<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $primaryKey = 'id';
    protected $fillable = ['street', 'number', 'zip_code', 'id_city'];


    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'id_city', 'id');
    }
}
