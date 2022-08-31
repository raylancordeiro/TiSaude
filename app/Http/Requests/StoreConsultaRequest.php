<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreConsultaRequest extends FormRequest
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
            'cons_codigo' => 'required|unique:consultas',
            'data' => 'required',
            'hora' => 'required',
            'cons_med'=> 'required',
            'cons_proc' => 'required',
            'cons_pac' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cons_codigo' => 'invalid param cons_codigo',
            'data' => 'invalid paramdata',
            'hora' => 'invalid paramhora',
            'cons_med'=> 'invalid paramcons_med',
            'cons_proc' => 'invalid paramcons_proc',
            'cons_pac' => 'invalid param cons_pac'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.*
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'status' => true
        ], 422));
    }
}
