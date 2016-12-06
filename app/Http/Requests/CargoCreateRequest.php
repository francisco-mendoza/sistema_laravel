<?php

namespace crm\Http\Requests;

use crm\Http\Requests\Request;

class CargoCreateRequest extends Request
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
            'nombre'          => 'required|unique:cargos',
        ];
    }
}
