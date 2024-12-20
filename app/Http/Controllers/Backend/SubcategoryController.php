<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('Backend.pages.subcategory.index', compact('categories'));
    }

    public function getData()
    {
        $subcategories = Subcategory::all();

        return Datatables::of($subcategories)
            ->addColumn('category_name', function ($subcategory) {
                return Category::find($subcategory->category_id)->category_name;
            })
            ->addColumn('subcategory_name', function ($subcategory) {
                return $subcategory->subcategory_name;
            })
            ->addColumn('image', function ($subcategory) {
                return '<img src="' . asset($subcategory->image) . '" alt="" style="width: 65px;">';
            })
            ->addColumn('status', function ($subcategory) {
                if ($subcategory->status == 1) {
                    return '<span style="cursor: pointer;" class="text-white btn bg-success" id="statusButton" data-id="' . $subcategory->id . '" data-status="' . $subcategory->status . '">Active</span>';
                } else {
                    return '<span style="cursor: pointer;" class="text-white btn bg-danger" id="statusButton" data-id="' . $subcategory->id . '" data-status="' . $subcategory->status . '">Deactive</span>';
                }
            })
            ->addColumn('action', function ($subcategory) {
                return
                    '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $subcategory->id . '" data-bs-toggle="modal" data-bs-target="#Edit">Edit</a>
                <a href="#" type="button" id="deleteButton" data-id="' . $subcategory->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->rawColumns(['category_name', 'subcategory_name', 'image', 'status', 'action'])
            ->make(true);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subcategory = new Subcategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->slug = Str::slug($request->subcategory_name);
        $subcategory->meta_title = $request->meta_title;
        $subcategory->meta_description = $request->meta_description;
        $subcategory->status = $request->status;

        if ($request->file('image')) {
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/subcategory/';
            $image->move($imagePath, $imageName);

            $subcategory->image   = $imagePath . $imageName;
        }

        $subcategory->save();
        return response()->json($subcategory, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        $subcategory = $subcategory;
        return response()->json($subcategory, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $subcategory = $subcategory;
        // if (empty($request->title)) {
        //     return response()->json('error', 200);
        // }

        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->slug = Str::slug($request->subcategory_name);
        $subcategory->meta_title = $request->meta_title;
        $subcategory->meta_description = $request->meta_description;
        $subcategory->status = $request->status;

        if ($request->file('image')) {
            $image = $request->file('image');

            if (!is_null($subcategory->image) && file_exists($subcategory->image)) {
                unlink($subcategory->image);
            }

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/subcategory/';
            $image->move($imagePath, $imageName);

            $subcategory->image   = $imagePath . $imageName;
        }

        $subcategory->update();

        return response()->json($subcategory, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory = $subcategory;

        if (!is_null($subcategory->image)) {
            if (file_exists($subcategory->image)) {
                unlink($subcategory->image);
            }
        }

        $subcategory->delete();
        return response()->json('success', 200);
    }

    public function statusUpdate($id)
    {
        $subcategory = Subcategory::findOrfail($id);

        if ($subcategory->status == 1) {
            $subcategory->status  =  0;
        } else if ($subcategory->status == 0) {
            $subcategory->status  =  1;
        }

        $subcategory->save();

        return response()->json($subcategory, 200);
    }
}
