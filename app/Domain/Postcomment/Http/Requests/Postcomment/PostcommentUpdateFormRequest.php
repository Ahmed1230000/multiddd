<?php

namespace App\Domain\Postcomment\Http\Requests\Postcomment;
use App\Domain\Postcomment\Http\Requests\Postcomment\PostcommentStoreFormRequest;

class PostcommentUpdateFormRequest extends PostcommentStoreFormRequest
{
    /**
     * Determine if the postcomment is authorized to make this request.
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
        // 'email'    => ['required','unique:postcomments,name,'.$this->route()->parameter('postcomment').',id'],
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
