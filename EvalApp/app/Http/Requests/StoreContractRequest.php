<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContractRequest extends FormRequest
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
            'Contract_Number' => ['required', 'string', 'max:255', 'unique:contract'],
            'Proposal_Number' => ['required', 'string', 'max:255'],
            'Approval_Date' => ['required' ],
            'Delivery_Date' => ['required' ],
            'Days_Due' => ['required', 'integer'],
            'Scope' => ['required', 'string'],
            'Contract_Value' => ['required', 'numeric'],
            'Document_URL' => ['nullable', 'url'],
            'Business_Line_Id' => ['required', 'integer'],
            'Customer_Id' => ['required', 'integer'],
            'State_Id' => ['required', 'integer'],
        ];
    }
    
    public function messages(): array
    {
        return [
            'Contract_Number.required' => 'El número de contrato es obligatorio',
            'Contract_Number.unique' => 'Este número de contrato ya está en uso',
            'Proposal_Number.required' => 'El número de propuesta es obligatorio',
            'Approval_Date.required' => 'La fecha de aprobación es obligatoria',
            'Approval_Date.date' => 'Por favor, ingresa una fecha válida para la aprobación',
            'Delivery_Date.required' => 'La fecha de entrega es obligatoria',
            'Delivery_Date.date' => 'Por favor, ingresa una fecha válida para la entrega',
            'Days_Due.required' => 'Los días a vencer son obligatorios',
            'Days_Due.integer' => 'Por favor, ingresa un valor entero para los días a vencer',
            'Scope.required' => 'El alcance es obligatorio',
            'Contract_Value.required' => 'El valor del contrato es obligatorio',
            'Contract_Value.numeric' => 'Por favor, ingresa un valor numérico para el contrato',
            'Document_URL.url' => 'Por favor, ingresa una URL válida para el documento',
            'Business_Line_Id.required' => 'El ID de la línea de negocio es obligatorio',
            'Business_Line_Id.integer' => 'Por favor, ingresa un valor entero para el ID de la línea de negocio',
            'Business_Line_Id.exists' => 'El ID de la línea de negocio no existe en la base de datos',
            'Customer_Id.required' => 'El ID del cliente es obligatorio',
            'Customer_Id.integer' => 'Por favor, ingresa un valor entero para el ID del cliente',
            'Customer_Id.exists' => 'El ID del cliente no existe en la base de datos',
            'State_Id.required' => 'El ID del estado es obligatorio',
            'State_Id.integer' => 'Por favor, ingresa un valor entero para el ID del estado',
            'State_Id.exists' => 'El ID del estado no existe en la base de datos',
        ];
    }
}    
