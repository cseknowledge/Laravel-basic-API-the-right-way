<?php

namespace App\Http\Requests\V1;

use App\DataTransferObjects\V1\PromotionDTO;
use App\Rules\V1\ActiveCategory;
use App\Rules\V1\ActiveLocation;
use Illuminate\Foundation\Http\FormRequest;

class PromotionStoreRequest extends FormRequest
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
            'title' => 'required|string|max:255|unique:promotions,title',
            'slug' => 'nullable|string|max:255|unique:promotions,slug',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'status' => 'nullable|in:draft,published',
            'is_approved' => 'sometimes|boolean',
            'categories' => ['required', 'array', 'min:1', new ActiveCategory()],
            'categories.*' => 'string',
            'locations' => ['required', 'array', 'min:1', new ActiveLocation()],
            'locations.*' => 'string',
        ];
    }
}
