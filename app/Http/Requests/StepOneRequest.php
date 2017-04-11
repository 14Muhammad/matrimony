<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StepOneRequest extends Request
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
                'mothertongue' => 'required|in:english,hindi,other',
                'religion' => 'required|in:hindu,other',
                'caste' => 'required',
                'manglik' => 'required|in:manglik,nonmanglik,angshikmanglik',
                'feet' => 'required',
                'country' => 'required',
                'city' => 'required',
                'marital_status' => 'required',
        ];
    }
}
