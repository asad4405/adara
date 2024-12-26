<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;

class PaymentGatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bkash_payment_gateway = PaymentGateway::where('type', '=', 'bkash')->first();
        $shurjopay_payment_gateway = PaymentGateway::where('type', '=', 'shurjopay')->first();
        return view('Backend.pages.api_integration.payment_gateway', compact('bkash_payment_gateway', 'shurjopay_payment_gateway'));
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
        // type
        // app_key
        // app_secret
        // username
        // password
        // base_url
        // success_url
        // return_url
        // prefix
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
        $payment_gateway = PaymentGateway::find($id);

        $payment_gateway->app_key = $request->app_key;
        $payment_gateway->app_secret = $request->app_secret;
        $payment_gateway->username = $request->username;
        $payment_gateway->password = $request->password;
        $payment_gateway->base_url = $request->base_url;
        $payment_gateway->success_url = $request->success_url;
        $payment_gateway->return_url = $request->return_url;
        $payment_gateway->prefix = $request->prefix;
        $payment_gateway->status = $request->status ? 1 : 0;

        $payment_gateway->update();
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
