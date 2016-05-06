<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProperty extends Request
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
            // 'prop_label' => 'required|max:255',
            'prop_name' => 'required|exists:projects,prj_id',
            'prop_type' => 'required',
            'prop_tenure' => 'required',
            'prop_tenure' => 'required',
            'prop_furnishing' => 'required',
            'prop_key' => 'required|min:4',
            'prop_location' => 'required',
            'prop_address' => 'required',
            'prop_no_bedrooms' => 'required|integer|min:1',
            'prop_no_bathrooms' => 'required|integer|min:1',
            'prop_built_up' => 'required|integer|min:1',
            'prop_price' => 'required|integer|min:1',
        ];
    }
}
