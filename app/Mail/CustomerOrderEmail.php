<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerOrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $cart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_order, $_cart)
    {
        $this->order=$_order;
        $this->cart=$_cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        
       
        return $this->markdown('mails.customer-order-email',[
            "order" => $this->order,
            "cart"=> $this->cart,
        ])
        ->subject("Ordine effettuato!");
    }
}
