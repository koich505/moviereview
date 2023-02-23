<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'movie_title'=> 'required|max:50',
            'stars' => 'required|max:5',
            'review_title' => 'max:50',
            'review_body'=> 'required|max:500'
        ];
    }

    public function attributes()
    {
        return[
            'movie_title'=>'映画タイトル',
            'stars'=>'星',
            'review_title'=>'題名',
            'review_body'=>'本文'
        ];
    }
}
