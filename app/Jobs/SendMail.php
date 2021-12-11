<?php

namespace App\Jobs;

use App\Mail\EmailShipped;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $slug;
    protected $date;
    protected $quantity;
    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($slug,$date,$quantity,$email)
    {
        //
        $this->slug=$slug;
        $this->date=$date;
        $this->quantity=$quantity;
        $this->email=$email;
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $email=new EmailShipped($this->slug,$this->date,$this->quantity);
        Mail::to($this->email)->send($email);


    }
}
