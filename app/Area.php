<?php

namespace crm;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table ="area_contactos";

     public $timestamps = false;

     protected $fillable =['nombre','descripcion'];
}
