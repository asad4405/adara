<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Backend.pages.order_status.index');
    }

    public function getData()
    {
        $order_statuses = OrderStatus::all();
        return DataTables::of($order_statuses)
            ->addColumn('name', function ($order_status) {
                return $order_status->name;
            })
            ->addColumn('status', function ($crate_page) {
            if ($crate_page->status == 1) {
                return '<label class="custom-toggle">
                                            <input type="checkbox" checked id="statusButton" data-id="' . $crate_page->id . '" data-status="' . $crate_page->status . '">
                                                <span class="toggle-slider"></span>
                                        </label>';
            } else {
                return '<label class="custom-toggle">
                                            <input type="checkbox" id="statusButton" data-id="' . $crate_page->id . '" data-status="' . $crate_page->status . '">
                                                <span class="toggle-slider"></span>
                                        </label>';
            }
            })
            ->rawColumns(['name','status'])
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
