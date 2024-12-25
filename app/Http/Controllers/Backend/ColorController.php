<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Backend.pages.colors.index');
    }

    public function getData()
    {
        $colors = Color::all();
        return DataTables::of($colors)
            ->addColumn('color_name', function ($color) {
                return $color->color_name;
            })
            ->addColumn('color_code', function ($color) {
                return $color->color_code;
            })
            ->addColumn('status', function ($color) {
                if ($color->status == 1) {
                    return '<span style="cursor: pointer;" class="text-white btn bg-success" id="statusButton" data-id="' . $color->id . '" data-status="' . $color->status . '">Active</span>';
                } else {
                    return '<span style="cursor: pointer;" class="text-white btn bg-danger" id="statusButton" data-id="' . $color->id . '" data-status="' . $color->status . '">Deactive</span>';
                }
            })
            ->addColumn('action', function ($color) {
                return
                    '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $color->id . '" data-bs-toggle="modal" data-bs-target="#Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="#" type="button" id="deleteButton" data-id="' . $color->id . '" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash"></i></a>';
            })
            ->rawColumns(['color_name', 'color_code', 'status', 'action'])
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
        $color = new Color();
        $color->color_name = $request->color_name;
        $color->color_code = $request->color_code;
        $color->status = $request->status;

        $color->save();
        return response()->json($color, 200);
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
        $color = Color::findOrFail($id);
        return response()->json($color, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $color = Color::findOrFail($id);
        $color->color_name = $request->color_name;
        $color->color_code = $request->color_code;
        $color->status = $request->status;

        $color->update();
        return response()->json($color, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = Color::findOrFail($id);

        $color->delete();
        return response()->json($color, 200);
    }

    public function statusUpdate($id)
    {
        $color = Color::findOrFail($id);
        if($color->status == 1){
            $color->status = 0;
        }elseif($color->status == 0){
            $color->status = 1;
        }

        $color->save();
        return response()->json($color, 200);
    }
}
