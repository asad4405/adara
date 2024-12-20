<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Backend.pages.brand.index');
    }

    public function getData()
    {
        $brands = Brand::all();

        return DataTables::of($brands)
            ->addColumn('brand_name', function ($brand) {
                return $brand->brand_name;
            })
            ->addColumn('image', function ($brand) {
                return '<img src="' . asset($brand->image) . '" style="width: 65px;">';
            })
            ->addColumn('status', function ($brand) {
                if ($brand->status == 1) {
                    return '<span style="cursor: pointer;" class="text-white btn bg-success" id="statusButton" data-id="' . $brand->id . '" data-status="' . $brand->status . '">Active</span>';
                } else {
                    return '<span style="cursor: pointer;" class="text-white btn bg-danger" id="statusButton" data-id="' . $brand->id . '" data-status="' . $brand->status . '">Deactive</span>';
                }
            })
            ->addColumn('action', function ($brand) {
                return '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $brand->id . '" data-bs-toggle="modal" data-bs-target="#Edit">Edit</a>
            <a href="#" type="button" id="deleteButton" data-id="' . $brand->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->rawColumns(['brand_name', 'image', 'status', 'action'])
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
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->slug = Str::slug($request->brand_name);
        $brand->status = $request->status;

        if ($request->file('image')) {
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/brand/';
            $image->move($imagePath, $imageName);

            $brand->image   = $imagePath . $imageName;
        }

        $brand->save();
        return response()->json($brand, 200);
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
        $brand = Brand::findorFail($id);
        return response()->json($brand, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->brand_name = $request->brand_name;
        $brand->slug = Str::slug($request->brand_name);
        $brand->status = $request->status;

        if ($request->file('image')) {
            $image = $request->file('image');

            if (!is_null($brand->image) && file_exists($brand->image)) {
                unlink($brand->image);
            }

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/brand/';
            $image->move($imagePath, $imageName);

            $brand->image   = $imagePath . $imageName;
        }

        $brand->update();
        return response()->json($brand, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        if (!is_null($brand->image)) {
            unlink($brand->image);
        }
        $brand->delete();
        return response()->json($brand, 200);
    }

    public function statusUpdate($id)
    {
        $childcategory = Brand::findOrfail($id);

        if ($childcategory->status == 1) {
            $childcategory->status  =  0;
        } else if ($childcategory->status == 0) {
            $childcategory->status  =  1;
        }

        $childcategory->save();

        return response()->json($childcategory, 200);
    }
}
