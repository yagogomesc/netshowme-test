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

        $upload = $request->archive->storeAs('contacts/archives', $request->archive->getClientOriginalName());

        $localArchive = Storage::url($request->archive->getClientOriginalName());

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->archive = 'Aaaaaaa';
        $contact->ip_address = $this->getUserIpAddress();
        $contact->save();

        return redirect()->route('contact.create')->with('success', 'Contato registrado com sucesso');
    }

    function getUserIpAddress(){
        $ip = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);

        return $ip;
    }
}
