<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CreatePage;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class CreatePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Backend.pages.create_page.index');
    }

    public function getData()
    {
        $crate_pages = CreatePage::all();
        return DataTables::of($crate_pages)
            ->addColumn('name', function ($crate_page) {
                return $crate_page->name;
            })
            ->addColumn('title', function ($crate_page) {
                return $crate_page->title;
            })
            ->addColumn('status', function ($crate_page) {
                if ($crate_page->status == 1) {
                    return '<span style="cursor: pointer;" class="text-white btn bg-success" id="statusButton" data-id="' . $crate_page->id . '" data-status="' . $crate_page->status . '">Active</span>';
                } else {
                    return '<span style="cursor: pointer;" class="text-white btn bg-danger" id="statusButton" data-id="' . $crate_page->id . '" data-status="' . $crate_page->status . '">Deactive</span>';
                }
            })
            ->addColumn('action', function ($crate_page) {
                return
                    '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $crate_page->id .
                    '" data-bs-toggle="modal" data-bs-target="#Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#" type="button" id="deleteButton" data-id="' . $crate_page->id . '" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash"></i></a>';
            })
            ->rawColumns(['phone', 'email', 'status', 'action'])
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
        $crate_page = new CreatePage();
        $crate_page->name = $request->name;
        $crate_page->slug = Str::slug($request->name);
        $crate_page->title = $request->title;
        $crate_page->description = $request->description;
        $crate_page->status = $request->status;

        $crate_page->save();
        return response()->json($crate_page, 200);
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
        $crate_page = CreatePage::findOrFail($id);
        return response()->json($crate_page,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $crate_page = CreatePage::findOrFail($id);
        $crate_page->name = $request->name;
        $crate_page->slug = Str::slug($request->name);
        $crate_page->title = $request->title;
        $crate_page->description = $request->description;
        $crate_page->status = $request->status;

        $crate_page->update();
        return response()->json($crate_page, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $crate_page = CreatePage::findOrFail($id);
        $crate_page->delete();
        return response()->json($crate_page, 200);
    }

    public function statusUpdate($id)
    {
        $crate_page = CreatePage::findOrFail($id);
        if ($crate_page->status == 1) {
            $crate_page->status = 0;
        } elseif ($crate_page->status == 0) {
            $crate_page->status = 1;
        }

        $crate_page->save();
        return response()->json($crate_page, 200);
    }
}
