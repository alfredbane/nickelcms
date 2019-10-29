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
          'db_user' => 'string|max:50|nullable',
          'db_passwrd' => '',
          'db_host' => 'required|string',
          'db_host_port' => 'integer|nullable',
          'db_prefix' =>'string'
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
            'db_host.required' => 'DB host is required!',
        ];
    }
}
