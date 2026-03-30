<?php

namespace App\Jobs;

use App\Mail\ContactSubmission;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class EmailDispatch implements ShouldQueue
{
    use Queueable;

    public string $email;
    public string $body;
    public string $email_type;
    public string $name;

    public function __construct(string $email, string $body, string $email_type, string $name)
    {
        $this->name = $name;
        $this->email = $email;
        $this->body = $body;
        $this->email_type = $email_type;
    }

    public function handle(): void
    {
        if ($this->email_type === "contact submission") {
            $this->contactEmail(); 
        }
    }

    private function contactEmail(): void
    {
        Mail::to($this->email)->send(new ContactSubmission($this->name, $this->body, $this->email));
    }
}