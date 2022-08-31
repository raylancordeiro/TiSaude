<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreMedicoRequest extends FormRequest
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
            'med_codigo' => 'required|unique:medicos',
            'med_CRM' => 'required|unique:medicos',
            'med_nome' => 'required',
            'med_espec' => 'required'
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
            'med_codigo.required' => 'A med_codigo is required',
            'med_CRM.required' => 'A med_CRM is required',
            'med_nome.required' => 'A med_nome is required',
            'med_espec.required' => 'A med_espec is required',
            'med_codigo.unique' => 'A med_codigo already exists',
            'med_CRM.unique' => 'A med_CRM already exists',
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
