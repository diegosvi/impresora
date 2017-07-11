<?php

namespace Impresoras\Http\Requests;

use Impresoras\Http\Requests\Request;

class CartuchoFormRequest extends Request
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
        'idmodelo_cartuchos' => 'required',
        'codigointerno' => 'required',
        'contadorinicialrecarga' => 'required|max:15',
        'fechacompra' => 'max:10',
        'numerofactura' => 'required',
        'observacion' => 'max:512'
        ];
    }
}
