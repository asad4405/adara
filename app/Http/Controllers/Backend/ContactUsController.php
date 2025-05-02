<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContactUsController extends Controller
{
    public function contact_usList()
    {
        return view('Backend.pages.contact_us.index');
    }

    public function getData()
    {
        $contactuses = ContactUs::latest()->get();
        return DataTables::of($contactuses)
            ->addColumn('name', function ($contact) {
                return $contact->name;
            })
            ->addColumn('phone', function ($contact) {
                return $contact->phone;
            })
            ->addColumn('email', function ($contact) {
                return $contact->email ? $contact->email : 'N/A';
            })
            ->addColumn('adress', function ($contact) {
                return $contact->adress;
            })
            ->addColumn('message', function ($contact) {
                return $contact->message;
            })
            ->addColumn('action', function ($contact) {
                return
                    '<a class="text-white btn btn-sm btn-primary" id="showButton" data-id="' . $contact->id . '" data-bs-toggle="modal" data-bs-target="#Show"><i class="fa-solid fa-eye"></i></a>';
            })
            ->rawColumns(['name', 'phone', 'email', 'adress', 'action'])
            ->make(true);
    }
}
