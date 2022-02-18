<?php

namespace App\Http\Requests\Admin\Client;

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
            'contract_date_from' => 'nullable|date',
            'contract_date_to' => 'nullable|date',
            'delivery_cost_from' => 'nullable|string',
            'delivery_cost_to' => 'nullable|string',
            'regions' => 'nullable|array',
            'regions.*' => 'nullable|string',
            'sort' => 'required|string',
            'order' => 'required|string',
        ];
    }
}
