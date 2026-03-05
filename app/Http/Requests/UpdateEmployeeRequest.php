<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email'      => 'required|email|unique:employees,email,' . $this->employee->id,
            'phone'      => 'nullable|string|max:20',
            'status' => 'required|in:active,inactive',
        ];
    }
}