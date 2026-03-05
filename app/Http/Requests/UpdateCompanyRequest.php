<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => 'required|string|max:255|unique:companies,name,' . $this->company->id,
            'email'   => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}