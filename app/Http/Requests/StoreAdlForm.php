<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdlForm extends FormRequest
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
            'transferring' => 'required',
            'toilet_action' => 'required',
            'flatland_walking' => 'required',
            'meal' => 'required',
            'excretion' => 'required',
            'bathing' => 'required',
            'clothes' => 'required',
            'discription' => 'required|max::255',
        ];
    }
}
