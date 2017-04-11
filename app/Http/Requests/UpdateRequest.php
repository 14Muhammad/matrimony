<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateRequest extends Request
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
            'name' => 'max:255|regex:/^[\pL\s\-]+$/u',
            'email' => 'email',
            'dob' => 'date',
            'gender' => 'in:male,female',
            'mobile' => 'numeric',
            'mothertongue' => 'regex:/^[\pL\s\-]+$/u|max:255',
            'religion' => 'regex:/^[\pL\s\-]+$/u|max:255',
            'caste' => 'regex:/^[\pL\s\-]+$/u|max:255',
            'subcaste' => 'regex:/^[\pL\s\-]+$/u|max:255',
            'country' => 'regex:/^[\pL\s\-]+$/u|max:255',
            'city' => 'regex:/^[\pL\s\-]+$/u|max:255',
            'manglik' => 'in:manglik,nonmanglik,angshikmanglik',
            'marital_status' => 'in:unmarried,divorced,awaitingdivorce',
            'feet' => 'numeric',
            'inches' => 'numeric',
            'degree' => 'regex:/^[\pL\s\-]+$/u|max:255',
            'occupation' => 'regex:/^[\pL\s\-]+$/u|max:255',
            'income' => 'regex:/^[\pL\s\-]+$/u|max:255',
        ];
    }
}
