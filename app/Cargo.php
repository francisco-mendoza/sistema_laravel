<?php

namespace crm;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
   protected $table ="cargo_contactos";

     public $timestamps = false;

     protected $fillable =['nombre','descripcion'];
}
