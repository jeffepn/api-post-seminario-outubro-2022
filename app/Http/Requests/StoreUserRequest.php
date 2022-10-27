<?php

namespace App\Http\Requests;

use App\Enums\UserType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{

    public function authorize()
    {
        return Gate::allows('user-has-permission-create-users');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'type' => ['required', Rule::in(UserType::all())],
            'password' => ['required', 'min:6', 'max:8'],
        ];
    }
}
