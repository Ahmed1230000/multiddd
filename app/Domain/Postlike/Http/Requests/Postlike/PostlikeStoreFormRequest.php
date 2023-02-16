<?php

namespace App\Domain\Postlike\Http\Requests\Postlike;

use App\Domain\Postlike\Http\Rules\PostlikeRule;
use App\Infrastructure\Http\AbstractRequests\BaseRequest as FormRequest;

class PostlikeStoreFormRequest extends FormRequest
{
    /**
     * Determine if the Postlike is authorized to make this request.
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
            'post_id'        => ['required', 'string', 'max:255', new PostlikeRule],
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
