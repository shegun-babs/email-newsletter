<?php

namespace App\Jobs;

use App\Mail\EmailNewsletter;
use App\Models\NewsletterSubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessNewsletter implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var NewsletterSubscriber
     */
    private $newsletterSubscriber;

    /**
     * Create a new job instance.
     *
     * @param NewsletterSubscriber $newsletterSubscriber
     */
    public function __construct(NewsletterSubscriber $newsletterSubscriber)
    {
        //
        $this->newsletterSubscriber = $newsletterSubscriber;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->newsletterSubscriber as $subscriber)
        {
            Mail::to($subscriber->email)->send(new EmailNewsletter());
        }
    }
}
