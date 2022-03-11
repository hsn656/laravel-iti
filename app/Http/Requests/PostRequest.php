<?php

namespace App\Http\Requests;

use App\Rules\PostLimitation;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $validationArr = [
            "description" => "required",
        ];
        if (request()->method == "PUT") {
            $validationArr = array_merge($validationArr, ["title" => [
                "required", "min:5",
                "unique:posts,title,{$this->post->id}"
            ]]);
        } else if (request()->method == "POST") {
            $validationArr = array_merge($validationArr, ["title" => [
                "required", "min:5",
                "unique:posts,title",
                new PostLimitation

            ]]);
        }
        return $validationArr;
    }

    public function messages()
    {
        return [
            "title.required" => "No post can be created without title"
        ];
    }
}
