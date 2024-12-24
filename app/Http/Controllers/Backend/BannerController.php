<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BannerCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner_categories = BannerCategory::where('status',1)->get();
        return view('Backend.pages.banner.index',compact('banner_categories'));
    }

    public function getData()
    {
        $banners = Banner::all();
        return DataTables::of($banners)
            ->addColumn('category', function ($banner) {
                return BannerCategory::findOrFail($banner->category_id)->category_name;
            })
            ->addColumn('image', function ($banner) {
                return '<img src="' . asset($banner->image) . '" alt="" style="width: 65px;">';
            })
            ->addColumn('link', function ($banner) {
                return $banner->link;
            })
            ->addColumn('status', function ($banner) {
                if ($banner->status == 1) {
                    return '<span style="cursor: pointer;" class="text-white btn bg-success" id="statusButton" data-id="' . $banner->id . '" data-status="' . $banner->status . '">Active</span>';
                } else {
                    return '<span style="cursor: pointer;" class="text-white btn bg-danger" id="statusButton" data-id="' . $banner->id . '" data-status="' . $banner->status . '">Deactive</span>';
                }
            })
            ->addColumn('action', function ($banner) {
                return
                    '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $banner->id . '" data-bs-toggle="modal" data-bs-target="#Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="#" type="button" id="deleteButton" data-id="' . $banner->id . '" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>';
            })
            ->rawColumns(['category', 'image', 'link', 'status', 'action'])
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
        $banner = new Banner();
        $banner->category_id = $request->category_id;
        $banner->link = $request->link;
        $banner->status = $request->status;

        if ($request->file('image')) {
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/banner/';
            $image->move($imagePath, $imageName);

            $banner->image   = $imagePath . $imageName;
        }

        $banner->save();
        return response()->json($banner, 200);
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
        $banner = Banner::findOrFail($id);
        return response()->json($banner, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->category_id = $request->category_id;
        $banner->link = $request->link;
        $banner->status = $request->status;
        if ($request->file('image')) {
            $image = $request->file('image');

            if (!is_null($banner->image) && file_exists($banner->image)) {
                unlink($banner->image);
            }

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/banner/';
            $image->move($imagePath, $imageName);

            $banner->image   = $imagePath . $imageName;
        }

        $banner->update();
        return response()->json($banner, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);

        if (!is_null($banner->image)) {
            if (file_exists($banner->image)) {
                unlink($banner->image);
            }
        }
        $banner->delete();
        return response()->json($banner, 200);
    }

    public function statusUpdate($id)
    {
        $banner = Banner::findOrFail($id);
        if ($banner->status == 1) {
            $banner->status = 0;
        } elseif ($banner->status == 0) {
            $banner->status = 1;
        }

        $banner->save();
        return response()->json($banner, 200);
    }
}
