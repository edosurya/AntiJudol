<?php

namespace App\Http\Requests\Frontend;

use App\Enums\IndustryEnum;
use App\Models\Reservation;
use App\Enums\EventGoalsEnum;
use App\Enums\IndustryNameEnum;
use App\Enums\JobTitleEnum;
use App\Enums\MajorEnum;
use App\Enums\TechInterestEnum;
use App\Enums\NumberOfEmployeeEnum;
use App\Enums\VisitorTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
        $validIndustries = implode(',', array_column(IndustryNameEnum::cases(), 'value'));
        $validJobTitles = implode(',', array_column(JobTitleEnum::cases(), 'value'));
        $validMajors = implode(',', array_column(MajorEnum::cases(), 'value'));
        $rules = [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Reservation::class],
            "phone" => ['required', 'numeric', 'digits_between:8,15'],
            "job_title" => ['required', 'integer', 'in:' . $validJobTitles],
            "company_name" => ['nullable', 'string'],
            "company_industry" => ['nullable', 'in:' . $validIndustries],
            "university_name" => ['nullable', 'string'],
            'major' => ['nullable', 'in:' . $validMajors],
            'dial_code' => ['required', 'string'],
            "g-recaptcha-response" => ['sometimes', 'required', 'captcha'],
            "company_major_custom" => ['nullable', 'string'],
            "interest_text" => ['required', 'string'],
        ];

        if (in_array($this->input('job_title'), [
            JobTitleEnum::ARS->value,
            // JobTitleEnum::AOC->value,
            JobTitleEnum::STD->value
        ])) {
            $rules['university_name'] = ['required', 'string'];
            $rules['major'] = ['required', 'in:' . $validMajors];
        } else {
            $rules['company_name'] = ['required', 'string'];
            $rules['company_industry'] = ['required', 'in:' . $validIndustries];
        }

        if ($this->input('company_industry') == IndustryNameEnum::OTH->value) {
            $rules['company_major_custom'] = ['required', 'string'];
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'firstname' => __('frontend.reservation.form.firstname'),
            'lastname' => __('frontend.reservation.form.lastname'),
            'email' => __('frontend.reservation.form.email'),
            "phone" => __('frontend.reservation.form.phone'),
            "job_title" => __('frontend.reservation.form.job_title'),
            "company_name" => __('frontend.reservation.form.company_name'),
            "company_industry" => __('frontend.reservation.form.company_industry'),
            "university_name" => __('frontend.reservation.form.university_name'),
            'major' => __('frontend.reservation.form.major'),
            'dial_code' => __('frontend.reservation.form.dial_code'),
            'g-recaptcha-response' => 'reCaptcha',
            'company_major_custom' => __('frontend.reservation.form.other'),
            'interest_text' => ' ',
        ];
    }


    public function messages()
    {
        $messages = [
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
        ];

        return $messages;
    }
}
