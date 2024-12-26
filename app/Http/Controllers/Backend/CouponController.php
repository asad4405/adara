<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Backend.pages.coupon.index');
    }

    public function getData()
    {
        $coupons = Coupon::all();
        return DataTables::of($coupons)
            ->addColumn('coupon_name', function ($coupon) {
                return $coupon->coupon_name;
            })
            ->addColumn('validity', function ($coupon) {
                return $coupon->validity;
            })
            ->addColumn('amount', function ($coupon) {
                if ($coupon->type == 1) {
                    return $coupon->amount . '%';
                } else {
                    return $coupon->amount . 'Taka';
                }
            })
            ->addColumn('limit', function ($coupon) {
                return $coupon->limit;
            })
            ->addColumn('status', function ($coupon) {
                if ($coupon->status == 1) {
                    return '<label class="custom-toggle">
                                <input type="checkbox" checked id="statusButton" data-id="' . $coupon->id . '" data-status="' . $coupon->status . '">
                                    <span class="toggle-slider"></span>
                            </label>';
                } else {
                    return '<label class="custom-toggle">
                                <input type="checkbox" id="statusButton" data-id="' . $coupon->id . '" data-status="' . $coupon->status . '">
                                    <span class="toggle-slider"></span>
                            </label>';
                }
            })
            ->addColumn('action', function ($coupon) {
                return
                    '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $coupon->id .
                    '" data-bs-toggle="modal" data-bs-target="#Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#" type="button" id="deleteButton" data-id="' . $coupon->id . '" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash"></i></a>';
            })
            ->rawColumns(['coupon_name', 'amount', 'validity', 'limit', 'status', 'action'])
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
        $coupon = new Coupon();
        $coupon->coupon_name = $request->coupon_name;
        $coupon->type = $request->type;
        $coupon->amount = $request->amount;
        $coupon->validity = $request->validity;
        $coupon->limit = $request->limit;
        $coupon->status = $request->status ? 1 : 0;

        $coupon->save();
        return response()->json($coupon, 200);
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
        $coupon = Coupon::findOrFail($id);
        return response()->json($coupon, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->coupon_name = $request->coupon_name;
        $coupon->type = $request->type;
        $coupon->amount = $request->amount;
        $coupon->validity = $request->validity;
        $coupon->limit = $request->limit;
        $coupon->status = $request->status ? 1 : 0;

        $coupon->update();
        return response()->json($coupon, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return response()->json($coupon, 200);
    }

    public function statusUpdate($id)
    {
        $coupon = Coupon::findOrFail($id);
        if ($coupon->status == 1) {
            $coupon->status = 0;
        } elseif ($coupon->status == 0) {
            $coupon->status = 1;
        }

        $coupon->save();
        return response()->json($coupon, 200);
    }
}
