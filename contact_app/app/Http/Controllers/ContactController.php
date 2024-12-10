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
            $contacts = Contact::where('company_id', request('company_id'))->get();
        }
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        return view('contacts.create', compact('companies'));
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email'
        ]);
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.show', compact('contact'));
    }

    public function company($id)
    {
        $company = Company::find($id);
        return view('contacts.company', compact('company'));
    }
}