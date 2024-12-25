<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SmsGateway;
use Illuminate\Http\Request;

class SmsGatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sms_gateway = SmsGateway::first();
        return view('Backend.pages.api_integration.sms_gateway', compact('sms_gateway'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sms_gateway = SmsGateway::find($id);
        $sms_gateway->url = $request->url;
        $sms_gateway->api_key = $request->api_key;
        $sms_gateway->senderid = $request->senderid;
        $sms_gateway->status = $request->status ? 1 : 0;
        $sms_gateway->order = $request->order ? 1 : 0;
        $sms_gateway->forgot_pass = $request->forgot_pass ? 1 : 0;
        $sms_gateway->password_g = $request->password_g ? 1 : 0;

        $sms_gateway->update();
        return back()->with('success', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
