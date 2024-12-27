<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CourierierApi;
use Illuminate\Http\Request;

class CourierApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $steadfast_courier = CourierierApi::where('type', '=', 'steadfast')->first();
        $pathao_courier = CourierierApi::where('type', '=', 'pathao')->first();
        return view('Backend.pages.api_integration.courier_api', compact('steadfast_courier', 'pathao_courier'));
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
        $courier_api = CourierierApi::find($id);

        $courier_api->api_key = $request->api_key;
        $courier_api->secret_key = $request->secret_key;
        $courier_api->url = $request->url;
        $courier_api->token = $request->token;
        $courier_api->status = $request->status ? 1 : 0;

        $courier_api->update();
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
