<?php

namespace crm;

use Illuminate\Database\Eloquent\Model;

class EstadoActividad extends Model
{
    protected $table ="estado_actividads";

    protected $fillable = ['nombre','descripcion','idTipoActividad'];


    public static function estados($id)
    {
    	return EstadoActividad::where('idTipoActividad','=',$id)
    	->get();
    }

}
