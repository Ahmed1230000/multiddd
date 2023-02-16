<?php

namespace App\Domain\User\Http\Requests\Loginuser;
use App\Domain\User\Http\Requests\Loginuser\LoginuserStoreFormRequest;

class LoginuserUpdateFormRequest extends LoginuserStoreFormRequest
{
    /**
     * Determine if the loginuser is authorized to make this request.
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
        // 'email'    => ['required','unique:loginusers,name,'.$this->route()->parameter('loginuser').',id'],
        ];

        return array_merge(parent::rules(), $rules);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return parent::attributes();
    }
}
