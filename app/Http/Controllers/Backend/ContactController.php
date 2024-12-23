<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Backend.pages.contact.index');
    }

    public function getData()
    {
        $contacts = Contact::all();
        return DataTables::of($contacts)
            ->addColumn('phone', function ($contact) {
                return $contact->phone;
            })
            ->addColumn('email', function ($contact) {
                return $contact->email;
            })
            ->addColumn('status', function ($contact) {
                if ($contact->status == 1) {
                    return '<span style="cursor: pointer;" class="text-white btn bg-success" id="statusButton" data-id="' . $contact->id . '" data-status="' . $contact->status . '">Active</span>';
                } else {
                    return '<span style="cursor: pointer;" class="text-white btn bg-danger" id="statusButton" data-id="' . $contact->id . '" data-status="' . $contact->status . '">Deactive</span>';
                }
            })
            ->addColumn('action', function ($contact) {
                return
                    '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $contact->id . '" data-bs-toggle="modal" data-bs-target="#Edit"><i class="fa-solid fa-pen-to-square"></i></a>';
            })
            ->rawColumns(['phone', 'email', 'status', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->hotline = $request->hotline;
        $contact->hotmail = $request->hotmail;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->map_link = $request->map_link;
        $contact->status = 1;

        $contact->update();
        return response()->json($contact, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
