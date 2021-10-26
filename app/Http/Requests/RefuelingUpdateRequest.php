<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefuelingUpdateRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'shop_id' => 'required|exists:shops,id',
            'amount' => 'required|max:255',
            'token' => 'required|max:255|string',
        ];
    }
}
