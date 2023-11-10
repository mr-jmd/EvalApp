<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Name' => 'required|string|max:255',
            'Percentage_Completion' => 'required|numeric|between:0,100',
            'Contract_Id' => 'required|exists:contract,id',
            'State_Id' => 'required|exists:state,id',
        ];
    }

    public function messages()
    {
        return [
            'Name.required' => 'El campo nombre del proyecto es obligatorio.',
            'Name.string' => 'El nombre del proyecto debe ser una cadena de texto.',
            'Name.max' => 'El nombre del proyecto no puede tener más de :max caracteres.',

            'Percentage_Completion.required' => 'El campo porcentaje de completado es obligatorio.',
            'Percentage_Completion.numeric' => 'El porcentaje de completado debe ser un valor numérico.',
            'Percentage_Completion.between' => 'El porcentaje de completado debe estar entre :min y :max.',

            'Contract_Id.required' => 'El campo ID de contrato es obligatorio.',
            'Contract_Id.exists' => 'El ID de contrato seleccionado no existe en la tabla de contratos.',

            'State_Id.required' => 'El campo ID de estado es obligatorio.',
            'State_Id.exists' => 'El ID de estado seleccionado no existe en la tabla de estados.',
        ];
    }

}
