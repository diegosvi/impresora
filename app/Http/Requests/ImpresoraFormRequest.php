<?php

namespace Impresoras\Http\Requests;

use Impresoras\Http\Requests\Request;

class ImpresoraFormRequest extends Request
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
            //
        'idmodelo_impresoras' => 'required',
        'numeroserie' => 'required',
        'ipimpresora' => 'required|max:15',
        'macimpresora' => 'required',
        'fechacompra' => 'max:10',
        'observacion' => 'max:512'
        

        ];
    }
}
