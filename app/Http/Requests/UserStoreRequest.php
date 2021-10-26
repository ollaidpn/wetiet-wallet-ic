<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'uuid' => 'required|max:255|string',
            'name' => 'required|max:255|string',
            'email' => 'required|unique:users|email',
            'telephone' => 'required|max:255',
            'balance' => 'required|max:255',
            'password' => 'required',
            'avatarf' => 'nullable|max:255|string',
            'currency' => 'required|max:3|string',
            'cni_face' => 'nullable|max:255|string',
            'cni_back' => 'nullable|max:255|string',
            'selfie_cni' => 'nullable|max:255|string',
            'roles' => 'array',
        ];
    }
}
