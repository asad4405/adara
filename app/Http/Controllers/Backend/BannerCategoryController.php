<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BannerCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BannerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Backend.pages.banner_category.index');
    }

    public function getdata()
    {
        $banner_categories = BannerCategory::all();
        return DataTables::of($banner_categories)
            ->addColumn('category_name', function ($banner_category) {
                return $banner_category->category_name;
            })
            ->addColumn('status', function ($banner_category) {
                if ($banner_category->status == 1) {
                    return '<span style="cursor: pointer;" class="text-white btn bg-success" id="statusButton" data-id="' . $banner_category->id . '"status-id="' . $banner_category->status . '">Active</span>';
                } else {
                    return '<span style="cursor: pointer;" class="text-white btn bg-danger" id="statusButton" data-id="' . $banner_category->id . '" data-status="' . $banner_category->status . '">Deactive</span>';
                }
            })
            ->addColumn('action', function ($banner_category) {
                return
                    '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $banner_category->id . '" data-bs-toggle="modal" data-bs-target="#Edit">Edit</a>
                <a href="#" type="button" id="deleteButton" data-id="' . $banner_category->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->rawColumns(['category_name', 'status', 'action'])
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
        $banner_category = new BannerCategory();

        $banner_category->category_name = $request->category_name;
        $banner_category->status = $request->status;
        $banner_category->save();

        return response()->json($banner_category, 200);
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
        $banner_category = BannerCategory::findOrFail($id);
        return response()->json($banner_category,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner_category = BannerCategory::findOrFail($id);

        $banner_category->category_name = $request->category_name;
        $banner_category->status = $request->status;
        $banner_category->update();

        return response()->json($banner_category, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner_category = BannerCategory::findOrFail($id);
        $banner_category->delete();

        return response()->json($banner_category, 200);
    }

    public function statusUpdate($id)
    {
        $banner_category = BannerCategory::findOrFail($id);

        if ($banner_category->status == 1) {
            $banner_category->status = 0;
        } elseif ($banner_category->status == 0) {
            $banner_category->status = 1;
        }

        $banner_category->save();

        return response()->json($banner_category, 200);
    }
}
