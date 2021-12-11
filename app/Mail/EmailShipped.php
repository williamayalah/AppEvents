<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailShipped extends Mailable
{
    use Queueable, SerializesModels;
    protected $slug;
    protected $date;
    protected $quantity;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($slug, $date, $quantity)
    {
        //
        $this->slug = $slug;
        $this->date = $date;
        $this->quantity = $quantity;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('williamsoftdev@gmail.com')
            ->subject('Compra de entradas')
            ->view('mails.mail')
            ->with([
                'slug'=>$this->slug,
                'date'=>$this->date,
                'quantity'=>$this->quantity
            ]);
    }
}
