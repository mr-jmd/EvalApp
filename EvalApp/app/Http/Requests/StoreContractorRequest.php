<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContractorRequest extends FormRequest
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
            'id' => ['required', 'unique:contractor'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:contractor'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'El Id es obligatorio',
            'id.unique' => 'Este Id ya está en uso',
            'name.required' => 'El nombre es obligatorio',
            'phone.required' => 'El teléfono es obligatorio',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Por favor, ingresa un correo electrónico válido',
            'email.unique' => 'Este correo electrónico ya está registrado',
        ];
    }
}
