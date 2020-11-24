<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResidentForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'resident_name' => 'required|max::255|',
            'age' => 'required',
            'gender' => 'required',
            'unit_id' => 'required',
            'assistance' => 'required|max::255',
            'info' => 'required|max::255',
        ];
    }
}
