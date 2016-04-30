<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateOfferKey extends Request
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
        // $property = $this->route()->getParameter('property');
        $ofk_property = $this->input('ofk_property');

        return [
            'ofk_key' => 'required|exists:properties,prop_key,prop_id,'.$ofk_property,
        ];
    }
}
