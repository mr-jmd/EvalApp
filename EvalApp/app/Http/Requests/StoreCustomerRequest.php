<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'unique:customers'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
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
