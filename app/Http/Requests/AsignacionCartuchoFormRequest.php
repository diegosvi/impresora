<?php

namespace Impresoras\Http\Requests;

use Impresoras\Http\Requests\Request;

class AsignacionCartuchoFormRequest extends Request
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
        'fechaasignacion' => 'required|max:10'
        ];
    }
}
