<?php

namespace App\Jobs;

use App\Mail\SubscriptionCouponMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendSubscriptionEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $couponCode;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $couponCode)
    {
        $this->email = $email;
        $this->couponCode = $couponCode;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::to($this->email)->send(new SubscriptionCouponMail($this->couponCode));
    }
}
