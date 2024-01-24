<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupportStoreRequest extends FormRequest
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
        $rules = [
            'subject' => 'required|string|min:3|max:255|unique:supports',
            'body' => 'required|string|min:3|max:10000',
        ];

        if ($this->method() ==  'PUT') {
            $rules['subject'] = [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('supports')->ignore($this->id)
            ];
        }

        return $rules;
    }
}
