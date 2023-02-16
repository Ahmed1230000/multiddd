<?php

namespace App\Domain\Superadmin\Http\Requests\Superadmin;
use App\Domain\Superadmin\Http\Requests\Superadmin\SuperadminStoreFormRequest;

class SuperadminUpdateFormRequest extends SuperadminStoreFormRequest
{
    /**
     * Determine if the superadmin is authorized to make this request.
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
        // 'email'    => ['required','unique:superadmins,name,'.$this->route()->parameter('superadmin').',id'],
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
