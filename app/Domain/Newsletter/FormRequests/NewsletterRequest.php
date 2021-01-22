<?php

namespace App\Domain\Newsletter\FormRequests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
{

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email:rfc,dns', 'unique:newsletter_subscribers'],
            'firstname' => 'required|string|min:3|max:20',
            'lastname' => 'required|string|min:3|max:20',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'The :attribute is already subscribed to newsletter',
        ];
    }

}
