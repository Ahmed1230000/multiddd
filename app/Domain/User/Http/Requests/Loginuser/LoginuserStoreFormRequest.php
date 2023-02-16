<?php

namespace App\Domain\User\Http\Requests\Loginuser;

use App\Domain\User\Http\Rules\LoginuserRule;
use App\Infrastructure\Http\AbstractRequests\BaseRequest as FormRequest;

class LoginuserStoreFormRequest extends FormRequest
{
    /**
     * Determine if the Loginuser is authorized to make this request.
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
        $rules = [
            'email'        => ['required', 'string', 'max:255', new LoginuserRule],
            'password'        => ['required', 'string', 'max:255'],
        ];
        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'        =>  __('main.name'),
        ];
    }
}
