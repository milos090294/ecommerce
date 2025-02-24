<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Support\Str;
use App\Jobs\SendSubscriptionEmail;
use App\Mail\SubscriptionCouponMail;
use Illuminate\Support\Facades\Mail;

class SubscribeComponent extends Component
{

    public $email;

    public function subscribe()
    {
        $this->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        $couponCode = 'DISCOUNT10-' . strtoupper(Str::random(6));

        // Save subscriber
        Subscriber::create([
            'email' => $this->email,
            'coupon_code' => $couponCode,
        ]);

        // Send email
        SendSubscriptionEmail::dispatch($this->email, $couponCode);

        session()->flash('message', 'You have successfully subscribed! Check your email for the coupon.');
        $this->reset('email');
    }

    public function render()
    {
        return view('livewire.subscribe-component');
    }
}
