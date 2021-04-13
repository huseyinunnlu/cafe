<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
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
            'title'=>'nullable|max:255',
            'link'=>'required|url',
            'icon'=>'nullable',
        ];
    }

    public function attributes(){
        return [
            'title'=>'Title',
            'link'=>'Link',
            'icon'=>'Icon',
        ];
    }
}
