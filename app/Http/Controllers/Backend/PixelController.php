<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pixel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PixelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Backend.pages.pixel.index');
    }

    public function getData()
    {
        $pixels = Pixel::all();
        return DataTables::of($pixels)
            ->addColumn('pixel_code', function ($pixel) {
                return $pixel->pixel_code;
            })
            ->addColumn('status', function ($pixel) {
                if ($pixel->status == 1) {
                    return '<span style="cursor: pointer;" class="text-white btn bg-success" id="statusButton" data-id="' . $pixel->id . '"status-id="' . $pixel->status . '">Active</span>';
                } else {
                    return '<span style="cursor: pointer;" class="text-white btn bg-danger" id="statusButton" data-id="' . $pixel->id . '" data-status="' . $pixel->status . '">Deactive</span>';
                }
            })
            ->addColumn('action', function ($pixel) {
                return
                    '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $pixel->id . '" data-bs-toggle="modal" data-bs-target="#Edit">Edit</a>
                <a href="#" type="button" id="deleteButton" data-id="' . $pixel->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->rawColumns(['pixel_code', 'status', 'action'])
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
        $pixel = new Pixel();
        $pixel->pixel_code = $request->pixel_code;
        $pixel->status = $request->status;
        $pixel->save();

        return response()->json($pixel, 200);
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
        $pixel = Pixel::findOrFail($id);
        return response()->json($pixel, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pixel = Pixel::findOrFail($id);
        $pixel->pixel_code = $request->pixel_code;
        $pixel->status = $request->status;

        $pixel->update();
        return response()->json($pixel, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pixel = Pixel::findOrFail($id);
        $pixel->delete();
        return response()->json($pixel, 200);
    }

    public function statusUpdate($id)
    {
        $pixel = Pixel::findOrFail($id);

        if ($pixel->status == 1) {
            $pixel->status = 0;
        } elseif ($pixel->status == 0) {
            $pixel->status = 1;
        }

        $pixel->save();

        return response()->json($pixel, 200);
    }
}
