<?php

namespace SGM\Http\Requests;

use SGM\Http\Requests\Request;

class CompraCreate extends Request
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
            'compras' => 'required',
        ];
    }
}
