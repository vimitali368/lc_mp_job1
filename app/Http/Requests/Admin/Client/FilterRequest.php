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
            'name' => 'string',
            'contract_date_from' => 'date',
            'contract_date_to' => 'date',
            'delivery_cost_from' => 'string',
            'delivery_cost_to' => 'string',
            'region' => 'string'
        ];
    }
}
