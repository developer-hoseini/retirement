<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LetterRequest extends FormRequest
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
        $rules = [
            'daftarKol'		    => 'required',
//        	'letterDate'	    => 'required|max:191',
        	'nationalCode'		=> 'required',
    		'bankCode'		=> 'required',
        ];
        return $rules;
    }
    public function messages()
    {
    	$messages = [
    		'required'		    => 'الزامی است'
    	];
    	return $messages;
    }
}
