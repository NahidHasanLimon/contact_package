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
    protected $contact;
    protected $content;
    public function __construct($contact,$content)
    {
        $this->contact = $contact;
        $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new ContactResponseEmail($this->content);
        Mail::to($this->contact['email'])->send($email);
    }
}
