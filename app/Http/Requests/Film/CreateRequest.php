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
            'age_limit' => ['required', 'in:0+,6+,12+,16+,18+'],
            'duration' => ['required', 'date_format:H:i'],
            'synopsis' => ['required', 'string', 'max:2000'],
            'poster' => ['nullable', 'image', 'max:3999'],
            'start' => ['required','date', 'after:yesterday'],
            'end' => ['required', 'date', 'after:start'],
        ];
    }
}
