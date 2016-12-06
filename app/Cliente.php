<?php

namespace crm;

use Illuminate\Database\Eloquent\Model;

use DB;
use Carbon\Carbon;

class Cliente extends Model
{
    protected $table ="clientes";

    public $timestamps = false;

    protected $fillable = ['idMinisterio', 'nombre','rut','codigo','sigla','idRegion','direccion','numeroTrabajadores',
    						'email','direccionWeb','fono','fonoContacto','fonoJefeDirecto','fonoSecretaria','skype','idTipoCliente','logo','presupuesto'];



  	public static function Clientes(){
		return DB::table('clientes')
			->join('ministerios','ministerios.id','=','clientes.idMinisterio')
			->join('regions','regions.id','=','clientes.idRegion')
			->join('tipo_clientes','tipo_clientes.id','=','clientes.idTipoCliente')
			->select('clientes.*', 'ministerios.nombre as nombreMinisterio', 'regions.region_nombre as region','tipo_clientes.nombre as tipoCliente')
			->orderBy('id', 'asc')
			->get();
	}

	public function setLogoAttribute($logo){
		$this->attributes['logo']= Carbon::now()->second.$logo->getClientOriginalName();
		$name = Carbon::now()->second.$logo->getClientOriginalName();
		\Storage::disk('local')->put($name, \File::get($logo));
	}


	


}
