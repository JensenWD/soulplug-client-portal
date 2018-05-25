<?php

namespace App\Mail;

use App\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyCustomerItemSold extends Mailable
{
    use Queueable, SerializesModels;

    public $item;

    /**
     * Create a new message instance.
     *
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your cosigned item ' . $this->item->name . " sold!")
            ->markdown('mail.item-sold');
    }
}
