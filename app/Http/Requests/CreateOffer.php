<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateOffer extends Request
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
          'of_date' => 'required|date_format:d/m/Y',
          'of_property' => 'required|exists:properties,prop_id',
          'of_buyer' => 'required|exists:users,id',
          'of_owner' => 'required|exists:users,id',
          'of_property_address' => 'required',
          'of_buyer_name' => 'required',
          'of_buyer_address' => 'required',
          'of_buyer_ic' => 'required',
          'of_buyer_tel' => 'required',
          'of_owner_name' => 'required',
          // 'of_owner_ic' => 'required',
          // 'of_owner_tel' => 'required',
          'of_purchase_price' => 'required|numeric|min:1',
          'of_downpayment_percent' => 'required|numeric|min:1|max:100',
          'of_paid_within' => 'required|integer|min:1',
      ];
    }
}
