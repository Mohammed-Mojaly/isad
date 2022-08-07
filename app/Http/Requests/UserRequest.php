<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'name' => 'required', 'string', 'max:255',
                        'email'         => 'required|email|max:255|unique:users',
                        'password' => 'required', 'string', 'min:8',
                        'roles' => 'required'
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'name' => 'required', 'string', 'max:255',
                        'email'         => 'required|email|max:255|unique:users,email,'.$this->route()->user->id,
                        'password' => 'nullable', 'string', 'min:8',
                        'roles' => 'required'
                    ];
                }
            default:
                break;
        }
    }
}
