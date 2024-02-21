<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['address_id', 'name', 'email', 'password', 'id_address'];

    public function address()
    {
        return $this->belongsTo('App\Models\Address', 'id_address', 'id');
    }
}
