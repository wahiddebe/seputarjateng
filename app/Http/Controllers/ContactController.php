<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('user.contact');
    }
    public function admin()
    {
        return view('admin.message', [
            'message' => Contact::latest()->get()
        ]);
    }
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->to('contact');
    }
}
