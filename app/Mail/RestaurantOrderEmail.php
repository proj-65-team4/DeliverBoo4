<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RestaurantOrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $cart;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_order, $_cart,$_user)
    {
        $this->order=$_order;
        $this->cart=$_cart;
        $this->user=$_user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('mails.restaurant-order-email',[
            "order" => $this->order,
            "cart"=> $this->cart,
            "user"=> $this->user
        ])
        ->subject("Hai una nuova ordinazione");
    }
}
