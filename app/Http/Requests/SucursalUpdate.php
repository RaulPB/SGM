<?php

namespace Ifiix\Http\Requests;

use Ifiix\Http\Requests\Request;

class SucursalUpdate extends Request
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
             //'nameS' => 'required|unique:sucursals', //es el nombre que le damos y que aparece en el mensaje de requerido y ademas
        ];
    }
}
