<?php

namespace SGM\Http\Requests;

use SGM\Http\Requests\Request;

class productoCreate extends Request
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
            'marca' => 'required',
            'modelo' => 'required',
            'precio' => 'required',
            'preciop' => 'required',
            'cantidad' => 'required',
        ];
    }
}
