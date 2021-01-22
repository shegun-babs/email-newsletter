<?php

namespace App\Domain\Newsletter\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnsubscribeController
{

    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules(), $this->messages());

        if ( $validator->fails() ){
            return response()->json([
                'message' => 'The given data was invalid',
                'errors' => $validator->errors()
            ]);
        }
        $this->unsubscribe($validator->validated()['email']);
        return response()->json(["status" => "success", "message" => "You are now unsubscribed"]);
    }

    private function unsubscribe($email) : bool {
        NewsletterSubscriber::where('email', $email)->delete();
        return true;
    }

    private function rules(){
        return [
            'email' => ['required', 'email:rfc,dns', 'exists:newsletter_subscribers']
        ];
    }

    private function messages(){
        return [
            'email.exists' => "The :attribute is not subscribed to our newsletter",
        ];
    }
}
