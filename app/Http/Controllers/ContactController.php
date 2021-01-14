<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Contact;
use App\Kategori;
use App\Kota;
use App\Medsos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        return view('user.contact', [
            'recent' => Artikel::latest()->take(3)->get(),
            'medsos' =>
            Medsos::latest()->get(),
            'today' => $today,
            'kategoris' => Kategori::get(),
            'semarang' => Kota::where('karesidenan_id', 1)->get(),
            'pekalongan' => Kota::where('karesidenan_id', 2)->get(),
            'pati' => Kota::where('karesidenan_id', 3)->get(),
            'banyumas' => Kota::where('karesidenan_id', 4)->get(),
            'kedu' => Kota::where('karesidenan_id', 5)->get(),
            'solo' => Kota::where('karesidenan_id', 6)->get(),
        ]);
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
