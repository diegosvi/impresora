<?php

namespace Impresoras\Http\Requests;

use Impresoras\Http\Requests\Request;

class RecargaCartuchoFormRequest extends Request
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
        'idcartuchos' => 'required',
        'numerorecarga' => 'required',
        'fechainiciorecarga' => 'required|max:10',
        'fechafinrecarga' => 'required|max:10',
        'contadoriniciorecarga' => 'required',
        'contadorfinrecarga' => 'required',
        'difcontinifinrecarga' => '',
        'observacion' => 'max:512'
        ];
    }
}
