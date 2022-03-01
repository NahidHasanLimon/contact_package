<?php

namespace  Nahidhasanlimon\Contact\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Nahidhasanlimon\Contact\Mail\ContactResponseEmail;
use Mail;
class ContactResposneJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new ContactResponseEmail($this->details);

        Mail::to($this->details['to'])->send($email);
    //    $view =  ['html'=> 'body here'];
        // Mail::send(['text' => 'view'],['user' => 'Hey'], function($message)  {
        //     $message->to('nh.limon2010@gmail.com',  'Nahid Limon');
        //     $message->from('youremail@example.com', 'Your Name'); 
        //     $message->subject('Hi there');
        // });
    }
}
