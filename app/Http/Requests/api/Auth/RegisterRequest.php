<?php

namespace App\Http\Requests\api\Auth;

use App\Http\Requests\api\Request;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends Request
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
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
            'photo' => 'required',
        ];
    }
}
