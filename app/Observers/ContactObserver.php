<?php

namespace App\Observers;

use App\Contact;
use App\Mail\ContactSend;

use Illuminate\Support\Facades\Mail;

class ContactObserver
{
    /**
     * Handle the contact "created" event.
     *
     * @param  \App\Contact  $contact
     * @return void
     */
    public function created(Contact $contact)
    {
        Mail::send(new ContactSend($contact));
    }
}
