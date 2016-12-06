<?php

namespace crm;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table ="tipo_usuario";

    public $timestamps = false;

    protected $fillable = ['nombre', 'descripcion'];
}
