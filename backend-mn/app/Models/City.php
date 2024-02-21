<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'id_state'];

    public function state()
    {
        return $this->belongsTo('App\Models\State', 'id_state', 'id');
    }
}
