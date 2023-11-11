<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppraisalRequest extends FormRequest
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
            'consecutive' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'id_project' => ['required', 'numeric'],
            'id_contractor' => ['required', 'numeric'],
            'id_city' => ['required', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'consecutive.required' => 'El consecutivo es obligatorio',
            'address.required' => 'La dirección es obligatoria',
            'id_project.required' => 'El ID del proyecto es obligatorio',
            'id_project.numeric' => 'Por favor, ingresa un valor numérico para el ID del proyecto',
            'id_project.exists' => 'El ID del proyecto no existe en la base de datos',
            'id_contractor.required' => 'El ID del contratista es obligatorio',
            'id_contractor.numeric' => 'Por favor, ingresa un valor numérico para el ID del contratista',
            'id_contractor.exists' => 'El ID del contratista no existe en la base de datos',
            'id_city.required' => 'El ID de la ciudad es obligatorio',
            'id_city.numeric' => 'Por favor, ingresa un valor numérico para el ID de la ciudad',
            'id_city.exists' => 'El ID de la ciudad no existe en la base de datos',
        ];
    }

}
