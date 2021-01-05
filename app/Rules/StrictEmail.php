<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StrictEmail implements Rule
{
    public function passes($attribute, $value)
    {
        $regex = "/^[\w!$&*.=^`|~#%'+\/?_{}-]+@([\w_-]+\.)+[a-zA-Z]{2,}$/";return !preg_match($regex, $value) ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.strict_email');
    }
}
