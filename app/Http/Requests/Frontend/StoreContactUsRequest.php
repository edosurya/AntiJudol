<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactUsRequest extends FormRequest
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
        return [
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            "company_name" => ['required', 'string'],
            "message" => ['required', 'string'],
            "g-recaptcha-response" => ['sometimes', 'required', 'captcha']
        ];
    }

    public function attributes()
    {
        return [
            'fullname' => 'Fullname',
            'email' => 'Email',
            "company_name" => 'Company Name',
            "message" => 'Message',
            // 'g-recaptcha-response' => 'Recaptcha'
        ];
    }

    public function messages()
    {
        $messages = [
            //messagenya bebas sesuai keperluan kalian
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
        ];

        return $messages;
    }
}
