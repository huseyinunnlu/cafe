<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'logo'=>'file|nullable|size:max:1024|mimes:png',
            'about'=>'required|max:15000|min:100',
            'contact'=>'required|min:50|max:1000',
            'phone1'=>'required',
            'phone2'=>'nullable',
            'email'=>'required|email',
            'adress'=>'required',
            'copyright'=>'required',
        ];
    }

    public function attributes() {
        return [
            'logo'=>'Cafe Logo',
            'about'=>'About Us Text',
            'contact'=>'Contact Us Text',
            'phone1'=>'1. Phone Number',
            'phone2'=>'2. Phone Number',
            'email'=>'Email Adress',
            'adress'=>'Cafe Adress',
            'copyright'=>'Copyright Text',
        ];
    }


}
