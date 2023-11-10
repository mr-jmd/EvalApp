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
            'id' => ['required', 'unique:projects'],
            'Name' => ['required', 'string', 'max:255'],
            'Percentage_Completion' => ['required', 'string', 'max:20'],
            'Contract_Id' => ['required', 'string', 'max:255'],
            'State_Id' => ['required', 'string', 'max:255'],
        ];
    }

}
