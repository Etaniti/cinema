<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:100'],
            'genres' => ['required'],
            'age_limit' => ['required', 'string'],
            'duration' => ['required', 'date_format:h:i'],
            'synopsis' => ['required', 'string', 'max:2000'],
            'poster' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max: 3999'],
        ];
    }
}
