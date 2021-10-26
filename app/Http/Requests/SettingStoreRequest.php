<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingStoreRequest extends FormRequest
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
            'email' => 'required|email',
            'telephone' => 'required|max:255',
            'logo_color' => 'nullable|max:255|string',
            'logo_white' => 'nullable|max:255|string',
            'fav_icon' => 'nullable|max:255|string',
        ];
    }
}
