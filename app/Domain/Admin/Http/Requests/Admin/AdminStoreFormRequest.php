<?php

namespace App\Domain\Admin\Http\Requests\Admin;

use App\Infrastructure\Http\AbstractRequests\BaseRequest as FormRequest;

class AdminStoreFormRequest extends FormRequest
{
    /**
     * Determine if the Admin is authorized to make this request.
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
            'email'        => ['required', 'string', 'max:255'],
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
