<?php

namespace crm\Http\Requests;

use crm\Http\Requests\Request;

class ActividadCreateRequest extends Request
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
            'idCliente'           => 'required',
            'idContacto'          => 'required',
            'idTipoActividad'     => 'required',
            //'comentario'          => 'required',
            //'actPadre'          => 'required',
            //'estado'            => 'required',
            //'jerarquia'         => 'required',
            //'orden'             => 'required',
            //'resultado'           => 'required',
            'usuario'             => 'required',
            'fecha'               => 'required',
        ];
    }
}
