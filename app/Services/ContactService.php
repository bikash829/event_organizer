<?php

namespace App\Services;

use App\Models\Contact;

class ContactService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function store(array $contactData): Contact
    {
        $contact = Contact::create($contactData);
        // More actions with that user: let's say, 5+ more lines of code
        // - Upload avatar
        // - Email to the user
        // - Notify admins about new user
        // - Create some data for that user
        // - and more...

        return $contact;
    }
}
