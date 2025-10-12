<?php

namespace App\Http\Requests\V1;

use App\Rules\V1\ActiveCategory;
use App\Rules\V1\ActiveLocation;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PromotionUpdateRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('promotions', 'title')->ignore($this->route('promotion')->id),
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('promotions', 'slug')->ignore($this->route('promotion')->id),
            ],
            'description' => ['nullable','string'],
            'price' => 'nullable|numeric',
            'owner_id' => 'nullable|exists:users,id',
            'status' => 'nullable|in:draft,published',
            'is_approved' => 'sometimes|boolean',
            'categories' => ['required', 'array', 'min:1', new ActiveCategory()],
            'categories.*' => 'string',
            'locations' => ['required', 'array', 'min:1', new ActiveLocation()],
            'locations.*' => 'string',
        ];
    }
}
