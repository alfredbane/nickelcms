<?php

namespace NickelCms\Installer\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatabaseStoreRequest extends FormRequest
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
            'db_name' => 'required|string|max:50',
            'db_user' => '',
            'db_passwrd' => '',

        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'db_name.required' => 'DB name is required!',
        ];
    }
}
