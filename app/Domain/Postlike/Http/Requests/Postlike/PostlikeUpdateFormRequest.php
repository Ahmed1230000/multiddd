<?php

namespace App\Domain\Postlike\Http\Requests\Postlike;
use App\Domain\Postlike\Http\Requests\Postlike\PostlikeStoreFormRequest;

class PostlikeUpdateFormRequest extends PostlikeStoreFormRequest
{
    /**
     * Determine if the postlike is authorized to make this request.
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
        // 'email'    => ['required','unique:postlikes,name,'.$this->route()->parameter('postlike').',id'],
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
