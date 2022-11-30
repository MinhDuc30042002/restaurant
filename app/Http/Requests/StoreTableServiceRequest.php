<?php

namespace App\Http\Requests;

use App\Models\TableService;
use Illuminate\Foundation\Http\FormRequest;

class StoreTableServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', TableService::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'state' => 'required|string',
            // TODO: check table state, order state
            'table_id' => 'required',
            'staff_id' => 'required',
            'order_id' => '',
        ];
    }
}
