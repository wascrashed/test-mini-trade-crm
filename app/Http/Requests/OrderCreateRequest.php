<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'customer' => 'required|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|integer',
            'items.*.count' => 'required|integer',
            'status' => 'nullable',
            'completed_at' => 'nullable',
        ];
    }
}
