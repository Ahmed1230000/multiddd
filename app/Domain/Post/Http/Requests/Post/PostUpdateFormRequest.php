<?php

namespace App\Domain\Post\Http\Requests\Post;
use App\Domain\Post\Http\Requests\Post\PostStoreFormRequest;

class PostUpdateFormRequest extends PostStoreFormRequest
{
    /**
     * Determine if the post is authorized to make this request.
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
        // 'email'    => ['required','unique:posts,name,'.$this->route()->parameter('post').',id'],
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
