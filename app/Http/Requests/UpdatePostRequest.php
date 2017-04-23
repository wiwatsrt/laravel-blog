<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|max:100',
            'slug' => 'required|max:120|unique:posts,slug,' . $this->route('post'),
            'content' => 'required',
            'category_id' => 'required',
            'publish_hour' => 'numeric|digits:2|between:00,23',
            'publish_minute' => 'numeric|digits:2|between:00,59'
        ];
    }
}
