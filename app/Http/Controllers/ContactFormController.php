<?php

namespace App\Http\Controllers;

use App\Mail\ContactSubmission;
use App\Models\Contact;
use App\Models\ContactForm;
use App\Http\Requests\StoreContactFormRequest;
use App\Http\Requests\UpdateContactFormRequest;

class ContactFormController extends Controller
{
    public function index()
    {
        return view('contact_form.index');
    }

    // ... create() ...

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactFormRequest $request)
    {
        $validatedData = $request->validated();

        // check to see if a user by this name already exists first.
        $contact = Contact::firstOrCreate([
            'name'=> $validatedData['name'],
        ],
        [
            'email'=> $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
        ]);

        $validatedData['contact_id'] = $contact->id;

        ContactForm::create($validatedData);
        Mail::to($validatedData['email'])->send(new ContactSubmission($contact->name));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(ContactForm $contactForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactForm $contactForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactFormRequest $request, ContactForm $contactForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactForm $contactForm)
    {
        //
    }
}
