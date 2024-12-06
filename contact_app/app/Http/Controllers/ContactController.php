<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Company;

class ContactController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        //$contacts = Contact::orderBy('first_name')->get();
        if(request('company_id') == null) {
            $contacts = Contact::orderBy('first_name')->get();
        } else {
            $contacts = Contact::where('company_id', request('company_id'))->orderBy('first_name')->get();
        }
        return view('contacts.index', compact('contact', 'companies'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.show', compact('contact'));
    }
}