<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePacienteRequest extends FormRequest
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
            'pac_codigo' => 'required|unique:pacientes',
            'pac_nome' => 'required',
            'pac_telefones' => 'required',
            'pac_dataNascimento' => 'required'
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
            'pac_codigo.required' => 'A pac_codigo is required',
            'pac_nome.required' => 'A pac_nome is required',
            'pac_telefones.required' => 'A pac_telefones is required',
            'pac_dataNascimento.required' => 'A pac_dataNascimento is required',
            'pac_codigo.unique' => 'A pac_codigo already exists'
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
