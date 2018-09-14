<?php

namespace App\Mail;

use App\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyCustomerOfItemStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $status, $item;

    /**
     * Create a new message instance.
     *
     * @param $status
     * @param Item $item
     */
    public function __construct($status, Item $item)
    {
        $this->status = $status;
        $this->item = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.cust-itemStatus')->subject('Your item was ' .  $this->status . ' for consignment');
    }
}
