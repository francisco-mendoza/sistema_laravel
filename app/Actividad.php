<?php

namespace crm;

use Illuminate\Database\Eloquent\Model;
use DB;

class Actividad extends Model
{
    protected $table ="actividads";

    public $timestamps = false;

    protected $fillable = ['idCliente', 'idContacto','idTipoActividad','comentario','actPadre','estado','jerarquia','resultado','usuario','fecha','fechaHora','presupuesto'];


    public static function Actividades($id)
    {
    	return DB::table('actividads')
    		->join('clientes','clientes.id','=','actividads.idCliente')
    		->join('contactos','contactos.id','=','actividads.idContacto')
    		->join('tipo_actividads','actividads.idTipoActividad','=','tipo_actividads.id')
    		->where('clientes.id', '=', $id)
            ->whereNull('actividads.actPadre')
    		->select('actividads.comentario as comentario','clientes.nombre as cliente','contactos.nombre as contacto','tipo_actividads.nombre as tipo','tipo_actividads.icono as icono')
    		->orderBy('actividads.id', 'desc')
    		->get();
    }
}
