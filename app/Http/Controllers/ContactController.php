<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    //
    public function AdminContact() {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function AddContact() {
        return view('admin.contact.create');
    }

    public function StoreContact(Request $request) {
        $validatedData  = $request->validate([
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('admin.contact')->with('success','Inserted contact successful');
    }

    public function Contact() {
        $contacts = Contact::first();
        return view('pages.contact', compact('contacts'));
    }

    public function ContactForm(Request $request) {
        $validatedData  = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('contact')->with('success','Your Message sent successfully');
    }

    public function AdminMessage() {
        $messages  = ContactForm::all();
        return view('admin.contact.message', compact('messages'));
    }
}
