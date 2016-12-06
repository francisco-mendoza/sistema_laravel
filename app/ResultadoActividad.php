<?php

namespace crm;

use Illuminate\Database\Eloquent\Model;

class ResultadoActividad extends Model
{
     protected $table ="resultado_actividads";

    protected $fillable = ['nombre','descripcion','tipo_actividad'];


    public static function resultados($id)
    {
    	return ResultadoActividad::where('tipo_estado','=',$id)
    	->get();
    }

   
}
