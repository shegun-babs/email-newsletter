<?php


namespace App\Domain\Newsletter\Controllers;


use App\Domain\Newsletter\FormRequests\NewsletterRequest;
use App\Models\NewsletterSubscriber;

class SubscribeController
{

    public function __invoke(NewsletterRequest $newsletterRequest)
    {
        $data = $newsletterRequest->validated();
        NewsletterSubscriber::create($data);
        return response()->json(["status" => "success", "message" => "Newsletter subscription successful"]);
    }
}
