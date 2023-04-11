<?php

namespace App\Http\Requests\CinemaHall;

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
            'title' => ['required', 'string', 'max: 100'],
            'rows' => ['required', 'integer'],
            'seats_in_row' => ['required', 'integer'],
            'seating_chart' => ['nullable'],
        ];
    }
}
