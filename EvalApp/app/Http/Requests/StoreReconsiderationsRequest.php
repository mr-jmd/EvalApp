<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReconsiderationsRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'receptionDate' => ['required', 'date'],
            'responseDate' => ['required', 'date'],
            'id_status' => ['required', 'numeric'],
            'id_reconsiderationType' => ['required', 'numeric'],
            'id_appraisal' => ['required', 'numeric'],
        ];
    }

    public function messages(): array
{
    return [
        'name.required' => 'El nombre es obligatorio',
        'receptionDate.required' => 'La fecha de recepción es obligatoria',
        'receptionDate.date' => 'Por favor, ingresa una fecha válida para la recepción',
        'responseDate.required' => 'La fecha de respuesta es obligatoria',
        'responseDate.date' => 'Por favor, ingresa una fecha válida para la respuesta',
        'id_status.required' => 'El ID de estado es obligatorio',
        'id_status.numeric' => 'Por favor, ingresa un valor numérico para el ID de estado',
        'id_status.exists' => 'El ID de estado no existe en la base de datos',
        'id_reconsiderationType.required' => 'El ID de tipo de reconsideración es obligatorio',
        'id_reconsiderationType.numeric' => 'Por favor, ingresa un valor numérico para el ID de tipo de reconsideración',
        'id_reconsiderationType.exists' => 'El ID de tipo de reconsideración no existe en la base de datos',
        'id_appraisal.required' => 'El ID de tasación es obligatorio',
        'id_appraisal.numeric' => 'Por favor, ingresa un valor numérico para el ID de tasación',
        'id_appraisal.exists' => 'El ID de tasación no existe en la base de datos',
    ];
}

}
