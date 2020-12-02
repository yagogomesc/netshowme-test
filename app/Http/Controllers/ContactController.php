<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\StoreContact;

use Illuminate\Http\Requests;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreContact  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContact $request)
    {
        $teste = $request->validated();

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->archive = 'Aaaaaaa';
        $contact->ip_address = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];;
        $contact->save();

        return redirect()->route('contact.create')->with('success', 'Contato registrado com sucesso');
    }
}
