<?php

namespace App\Domain\Postlike\Http\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class PostlikeRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $postlike = DB::table('postlikes')->where(
            [
                ['post_id', $value],
                ['user_id', auth('user-api')->user()->id],
            ]
        )->exists();
        if ($postlike) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'thish Like Alraedy Exists !! ';
    }
}
