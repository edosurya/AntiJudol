<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->user->id;
        $rules = [
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $id . ',id'],
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:1,2'],
        ];

        if (!is_null($this->password)) {
            $rules['password'] = ['required', 'confirmed', 'min:8'];
            $rules['password_confirmation'] = ['required', 'min:8'];
        }

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'type' => 'Role',
            'password' => 'Password',
            'password_confirmation' => 'Confirm Password',
        ];
    }
}
