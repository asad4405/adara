<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function manage()
    {
        return view('Backend.pages.category.manage');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->front_view = $request->front_view;
        $category->status = $request->status ? 1 : 0;

        if ($request->file('image')) {
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/category/';
            $image->move($imagePath, $imageName);

            $category->image   = $imagePath . $imageName;
        }

        $category->save();
        return response()->json($category, 200);
    }

    public function getData()
    {
        $categories = Category::all();

        return Datatables::of($categories)
            ->addColumn('category_name', function ($category) {
                return $category->category_name;
            })
            ->addColumn('image', function ($category) {
                return '<img src="' . asset($category->image) . '" alt="" style="width: 65px;">';
            })
            ->addColumn('status', function ($category) {
                if ($category->status == 1) {
                    return '<label class="custom-toggle">
                                    <input type="checkbox" checked id="statusButton" data-id="' . $category->id . '" data-status="' . $category->status . '">
                                        <span class="toggle-slider"></span>
                                </label>';
                } else {
                    return '<label class="custom-toggle">
                                    <input type="checkbox" id="statusButton" data-id="' . $category->id . '" data-status="' . $category->status . '">
                                        <span class="toggle-slider"></span>
                                </label>';
                }
            })
            ->addColumn('front_view', function ($category) {
                if ($category->front_view == 1) {
                    return '<label class="custom-toggle">
                                        <input type="checkbox" checked id="frontViewButton" data-id="' . $category->id . '" data-status="' . $category->front_view . '">
                                            <span class="toggle-slider"></span>
                                    </label>';
                } else {
                    return '<label class="custom-toggle">
                                        <input type="checkbox" id="frontViewButton" data-id="' . $category->id . '" data-status="' . $category->front_view . '">
                                            <span class="toggle-slider"></span>
                                    </label>';
                }
            })
            ->addColumn('action', function ($category) {
                return
                    '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $category->id . '" data-bs-toggle="modal" data-bs-target="#Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="#" type="button" id="deleteButton" data-id="' . $category->id . '" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash"></i></a>';
            })
            ->rawColumns(['category_name', 'image', 'status', 'front_view', 'action'])
            ->make(true);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json($category, 200);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrfail($id);

        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->front_view = $request->front_view;
        $category->status = $request->status ;

        if ($request->file('image')) {
            $image = $request->file('image');

            if (!is_null($category->image) && file_exists($category->image)) {
                unlink($category->image);
            }

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/category/';
            $image->move($imagePath, $imageName);

            $category->image   = $imagePath . $imageName;
        }

        $category->save();

        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = Category::findOrfail($id);

        if (!is_null($category->image) && file_exists($category->image)) {
            unlink($category->image);
        }

        $category->delete();
        return response()->json('success', 200);
    }

    public function status($id)
    {
        $category = Category::findOrfail($id);

        if ($category->status == 1) {
            $category->status  =  0;
        } else if ($category->status == 0) {
            $category->status  =  1;
        }

        $category->save();

        return response()->json($category, 200);
    }

    public function frontView($id)
    {
        $category = Category::findOrfail($id);

        if ($category->front_view == 1) {
            $category->front_view  =  0;
        } else if ($category->front_view == 0) {
            $category->front_view  =  1;
        }

        $category->save();

        return response()->json($category, 200);
    }
}
