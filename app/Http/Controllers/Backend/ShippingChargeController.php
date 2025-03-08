<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingCharge;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ShippingChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Backend.pages.shipping_charge.index');
    }

    public function getData()
    {
        $shipping_charges = ShippingCharge::all();
        return DataTables::of($shipping_charges)
            ->addColumn('name', function ($shipping_charge) {
                return $shipping_charge->name;
            })
            ->addColumn('amount', function ($shipping_charge) {
                return $shipping_charge->amount;
            })
            ->addColumn('status', function ($shipping_charge) {
            if ($shipping_charge->status == 1) {
                return '<label class="custom-toggle">
                                            <input type="checkbox" checked id="statusButton" data-id="' . $shipping_charge->id . '" data-status="' . $shipping_charge->status . '">
                                                <span class="toggle-slider"></span>
                                        </label>';
            } else {
                return '<label class="custom-toggle">
                                            <input type="checkbox" id="statusButton" data-id="' . $shipping_charge->id . '" data-status="' . $shipping_charge->status . '">
                                                <span class="toggle-slider"></span>
                                        </label>';
            }
            })
            ->addColumn('action', function ($shipping_charge) {
                return
                    '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $shipping_charge->id . '" data-bs-toggle="modal" data-bs-target="#Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="#" type="button" id="deleteButton" data-id="' . $shipping_charge->id . '" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>';
            })
            ->rawColumns(['name', 'amount', 'status', 'action'])
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
        $shipping_charge = new ShippingCharge();
        $shipping_charge->name = $request->name;
        $shipping_charge->amount = $request->amount;
        $shipping_charge->status = $request->status;
        $shipping_charge->save();

        return response()->json($shipping_charge, 200);
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
        $shipping_charge = ShippingCharge::findOrFail($id);
        return response()->json($shipping_charge, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $shipping_charge = ShippingCharge::findOrFail($id);
        $shipping_charge->name = $request->name;
        $shipping_charge->amount = $request->amount;
        $shipping_charge->status = $request->status;
        $shipping_charge->update();

        return response()->json($shipping_charge, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shipping_charge = ShippingCharge::findOrFail($id);
        $shipping_charge->delete();
        return response()->json($shipping_charge, 200);
    }

    public function statusUpdate($id)
    {
        $shipping_charge = ShippingCharge::findOrFail($id);
        if ($shipping_charge->status == 1) {
            $shipping_charge->status = 0;
        } elseif ($shipping_charge->status == 0) {
            $shipping_charge->status = 1;
        }

        $shipping_charge->save();
        return response()->json($shipping_charge, 200);
    }
}
