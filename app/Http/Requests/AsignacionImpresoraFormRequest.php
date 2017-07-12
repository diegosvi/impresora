<?php

namespace Impresoras\Http\Requests;

use Impresoras\Http\Requests\Request;

class AsignacionImpresoraFormRequest extends Request
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
        'idareas' => 'required',
        'idoficinas' => 'required',
        'idimpresoras'=> 'required',
        'fechaasignacion' => 'required|max:10'
        ];
    }
}
