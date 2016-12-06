<?php

namespace crm\Http\Requests;

use crm\Http\Requests\Request;

class ClienteUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idMinisterio'       => 'required',
            'nombre'             => 'required',
            'rut'                => 'required',
            //'codigo'             => 'required',
            //'sigla'              => 'required',
            'idRegion'           => 'required',
            //'direccion'          => 'required',
            //'numeroTrabajadores' => 'required',
            'email'              => 'required|Email',
            //'direccionWeb'       => 'required',
            'fono'               => 'required',
            //'skype'              => 'required',
            'idTipoCliente'      => 'required',
            //'logo'               => 'required',
            //'presupuesto'        => 'required',
        ];
    }
}
