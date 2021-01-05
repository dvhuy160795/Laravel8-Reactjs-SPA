<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class StrictEmail
 *
 * @package App\Rules
 */
class StrictUrl implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  bool   $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $regex = "/^https?:\/\/[-\da-z]+(?:\.[-\da-z]+)+\/?[!#-;=?@~\w]*$/";

        return !preg_match($regex, $value) ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('messages.validate_url');
    }
}
