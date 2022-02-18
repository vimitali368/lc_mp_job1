<?php

namespace App\Http\Requests\Admin\Fertilizer;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
            'norm_nitrogen' => 'nullable|numeric',
            'norm_phosphorus' => 'nullable|numeric',
            'norm_potassium' => 'nullable|numeric',
            'culture_ids' => 'nullable|array',
            'culture_ids.*' => 'nullable|numeric|exists:cultures,id',
            'districts' => 'nullable|array',
            'districts.*' => 'nullable|string',
            'costs' => 'nullable|array',
            'costs.*' => 'nullable|numeric',
            'description' => 'nullable|string',
            'appointment' => 'nullable|string'
        ];
    }
}
