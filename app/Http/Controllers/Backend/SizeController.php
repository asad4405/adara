<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Backend.pages.size.index');
    }

    public function getData()
    {
        $sizes = Size::all();
        return DataTables::of($sizes)
            ->addColumn('size_name', function ($size) {
                return $size->size_name;
            })
            ->addColumn('status', function ($size) {
                if ($size->status == 1) {
                    return '<span style="cursor: pointer;" class="text-white btn bg-success" id="statusButton" data-id="' . $size->id . '" data-status="' . $size->status . '">Active</span>';
                } else {
                    return '<span style="cursor: pointer;" class="text-white btn bg-danger" id="statusButton" data-id="' . $size->id . '" data-status="' . $size->status . '">Deactive</span>';
                }
            })
            ->addColumn('action', function ($size) {
                return
                    '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $size->id . '" data-bs-toggle="modal" data-bs-target="#Edit">Edit</a>
                <a href="#" type="button" id="deleteButton" data-id="' . $size->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->rawColumns(['size_name', 'status', 'action'])
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
        $size = new Size();
        $size->size_name = $request->size_name;
        $size->status = $request->status;

        $size->save();
        return response()->json($size, 200);
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
        $size = Size::findOrFail($id);
        return response()->json($size, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $size = Size::findOrFail($id);
        $size->size_name = $request->size_name;
        $size->status = $request->status;

        $size->update();
        return response()->json($size, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $size = Size::findOrFail($id);

        $size->delete();
        return response()->json($size, 200);
    }

    public function statusUpdate($id)
    {
        $size = Size::findOrFail($id);
        if ($size->status == 1) {
            $size->status = 0;
        } elseif ($size->status == 0) {
            $size->status = 1;
        }

        $size->save();
        return response()->json($size, 200);
    }
}
