<?php
namespace app\Traits;

trait ModelTrait
{
    public function scopeGetPaginated($query, $perPage = 15)
    {
        return $query->paginate($perPage);
    }

    // Validate input
    public function validate($input, $rules)
    {
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return General::jsonBadResponse(implode("<br />", $validator->errors()->all()));
        } else {
            return null;
        }
    }

    public function scopeToDropDown($query, $key_col, $value_col)
    {
        return [''=> trans('general.select_any') ] + array_column($query->get()->toArray(), $value_col, $key_col);
    }

    public function scopeToJson($query)
    {
        return $query->get()->toJson();
    }

    public function scopeFindOrCreate($match, $input)
    {

    }
}
