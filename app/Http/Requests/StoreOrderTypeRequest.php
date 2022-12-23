<?php

namespace App\Http\Requests;

use App\Models\OrderType;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', OrderType::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:order_types',
        ];
    }
}
