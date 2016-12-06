<?php

namespace crm;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table ="movies";

    public $timestamps = false;

    protected $fillable = ['nombre', 'descripcion'];
}
