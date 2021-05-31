<?php

namespace App\Http\Requests\Admin\Users;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,id,' . $this->user->id,
            'role' => ['required', 'string', Rule::in([User::ROLE_ADMIN, User::ROLE_USER])],
        ];
    }
}
