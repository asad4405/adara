<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Childcategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ChildcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('Backend.pages.childcategory.index', compact('subcategories'));
    }

    public function getData()
    {
        $childcategories = Childcategory::all();

        return DataTables::of($childcategories)
            ->addColumn('subcategory_name', function ($childcategory) {
                return Subcategory::find($childcategory->subcategory_id)->subcategory_name;
            })
            ->addColumn('subcategory_name', function ($childcategory) {
                return $childcategory->childcategory_name;
            })
            ->addColumn('image', function ($childcategory) {
                return '<img src="' . asset($childcategory->image) . '" alt="" style="width: 65px;">';
            })
            ->addColumn('status', function ($childcategory) {
                if ($childcategory->status == 1) {
                    return '<span style="cursor: pointer;" class="text-white btn bg-success" id="statusButton" data-id="' . $childcategory->id . '" data-status="' . $childcategory->status . '">Active</span>';
                } else {
                    return '<span style="cursor: pointer;" class="text-white btn bg-danger" id="statusButton" data-id="' . $childcategory->id . '" data-status="' . $childcategory->status . '">Deactive</span>';
                }
            })
            ->addColumn('action', function ($childcategory) {
                return
                    '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $childcategory->id . '" data-bs-toggle="modal" data-bs-target="#Edit">Edit</a>
                <a href="#" type="button" id="deleteButton" data-id="' . $childcategory->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->rawColumns(['subcategory_name', 'childcategory_name', 'image', 'status', 'action'])
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
        $childcategory = new Childcategory();
        $childcategory->subcategory_id = $request->subcategory_id;
        $childcategory->childcategory_name = $request->childcategory_name;
        $childcategory->slug = Str::slug($request->childcategory_name);
        $childcategory->meta_title = $request->meta_title;
        $childcategory->meta_description = $request->meta_description;
        $childcategory->status = $request->status;

        if ($request->file('image')) {
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/childcategory/';
            $image->move($imagePath, $imageName);

            $childcategory->image   = $imagePath . $imageName;
        }

        $childcategory->save();
        return response()->json($childcategory, 200);
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
        $childcategory = Childcategory::findOrFail($id);
        return response()->json($childcategory, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $childcategory = Childcategory::findOrFail($id);
        // if (empty($request->title)) {
        //     return response()->json('error', 200);
        // }

        $childcategory->subcategory_id = $request->subcategory_id;
        $childcategory->childcategory_name = $request->childcategory_name;
        $childcategory->slug = Str::slug($request->childcategory_name);
        $childcategory->meta_title = $request->meta_title;
        $childcategory->meta_description = $request->meta_description;
        $childcategory->status = $request->status;

        if ($request->file('image')) {
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/childcategory/';
            $image->move($imagePath, $imageName);

            $childcategory->image   = $imagePath . $imageName;
        }

        $childcategory->update();

        return response()->json($childcategory, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $childcategory = Childcategory::findOrFail($id);

        if (!is_null($childcategory->image)) {
            if (file_exists($childcategory->image)) {
                unlink($childcategory->image);
            }
        }

        $childcategory->delete();
        return response()->json('success', 200);
    }

    public function statusUpdate($id)
    {
        $childcategory = Childcategory::findOrfail($id);

        if ($childcategory->status == 1) {
            $childcategory->status  =  0;
        } else if ($childcategory->status == 0) {
            $childcategory->status  =  1;
        }

        $childcategory->save();

        return response()->json($childcategory, 200);
    }

}
