<?php

namespace crm;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
     protected $table ="contactos";

     public $timestamps = false;

     protected $fillable =['nombre','apellido','idCliente','idCargo','email','email_secretaria','fono',
     						'movil','idArea','idRegion','direccionPostal','skype','cumpleaños','hobbies','facebook','linkedin','idEstado'];
}
