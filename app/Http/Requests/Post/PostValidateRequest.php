<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostValidateRequest extends FormRequest
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
     * @return array<string, mixed>
     *
     ******** Class 71 ********
     */
    public function rules()
    {
        return [
            'Title' => 'required|min:5|max:25',
            'Description' => 'required|min:5|max:500',
            'Is_publish' => 'required',
            'Is_active' => 'required'
        ];
    }
}
