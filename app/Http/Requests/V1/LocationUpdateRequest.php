<?php

namespace App\Http\Requests\V1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class LocationUpdateRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('locations', 'name')->ignore($this->route('location')->id),
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('locations', 'slug')->ignore($this->route('location')->id),
            ],
            'description' => ['nullable','string'],
            'is_active'   => ['sometimes','boolean'],
        ];
    }
}
