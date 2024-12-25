<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MailGateway;
use Illuminate\Http\Request;

class MailGatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mail_getway = MailGateway::first();
        return view('Backend.pages.api_integration.mail_gateway', compact('mail_getway'));
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
        // mail_mailer
        // mail_host
        // mail_port
        // mail_username
        // mail_password
        // mail_encryption
        // status
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mail_getway = MailGateway::find($id);
        $mail_getway->mail_mailer = $request->mail_mailer;
        $mail_getway->mail_host = $request->mail_host;
        $mail_getway->mail_port = $request->mail_port;
        $mail_getway->mail_username = $request->mail_username;
        $mail_getway->mail_password = $request->mail_password;
        $mail_getway->mail_encryption = $request->mail_encryption;
        $mail_getway->status = $request->status ? 1 : 0;
        $mail_getway->order = $request->order ? 1 : 0;
        $mail_getway->forgot_pass = $request->forgot_pass ? 1 : 0;
        $mail_getway->password_g = $request->password_g ? 1 : 0;

        $mail_getway->update();
        return back()->with('success','Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
