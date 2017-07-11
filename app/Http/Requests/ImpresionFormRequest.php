<?php

namespace Impresoras\Http\Requests;

use Impresoras\Http\Requests\Request;

class ImpresionFormRequest extends Request
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
        'idimpresoras'=> 'required',
        'fechainicioimpresion'=> 'required|max:10',
        'fechafinimpresion'=> 'required|max:10',
        'contadorinicioimpresion'=> 'required',
        'contadorfinimpresion'=> 'required',
        'difconinifinimpresion'=> 'required',
        'observacion'=> 'max:512'

        ];
    }
}
