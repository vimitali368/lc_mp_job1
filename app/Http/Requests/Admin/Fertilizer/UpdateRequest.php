<?php

namespace App\Http\Requests\Admin\Fertilizer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'norm_nitrogen' => 'numeric',
            'norm_phosphorus' => 'numeric',
            'norm_potassium' => 'numeric',
            'culture_id' => 'numeric',
            'district' => 'string',
            'cost' => 'numeric',
            'description' => 'string',
            'appointment' => 'string'
        ];
    }
}
