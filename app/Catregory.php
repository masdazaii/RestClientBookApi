<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catregory extends Model
{
    protected $table='category';

    function book()
    {
        return $this->hasMany('App\Book','id_category');
    }
}
