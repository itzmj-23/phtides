<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDateRangeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'min_date' => 'required|date|before:max_date',
            'max_date' => 'required|date|after:min_date',
            'updated_by' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'min_date.before' => 'The :attribute must be a date before maximum date.',
            'max_date.after' => 'The :attribute must be a date after minium date.',
        ];
    }

    public function attributes(): array
    {
        return [
            'min_date' => 'minimum date',
            'max_date' => 'maximum date',
        ];
    }
}
