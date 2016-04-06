<?php 

namespace App\THouz\FormError;

use Illuminate\Support\HtmlString;

class ErrorBuilder
{
	public function block($errors, $field)
	{
		if ($errors->has($field)) {
			return $this->toHtmlString('<span class="label label-danger">'. $errors->first($field) . '</span>');			
		}
		return null;
	}

    /**
     * Transform the string to an Html serializable object
     *
     * @param $html
     *
     * @return \Illuminate\Support\HtmlString
     */
    protected function toHtmlString($html)
    {
        return new HtmlString($html);
    }

}
