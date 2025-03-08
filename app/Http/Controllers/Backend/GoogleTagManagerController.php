<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\GoogleTagManager;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class GoogleTagManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Backend.pages.google_tag_manager.index');
    }

    public function getData()
    {
        $gtms = GoogleTagManager::all();
        return DataTables::of($gtms)
            ->addColumn('code', function ($gtm) {
                return $gtm->code;
            })
            ->addColumn('status', function ($gtm) {
                if ($gtm->status == 1) {
                    return '<label class="custom-toggle">
                                                <input type="checkbox" checked id="statusButton" data-id="' . $gtm->id . '" data-status="' . $gtm->status . '">
                                                    <span class="toggle-slider"></span>
                                            </label>';
                } else {
                    return '<label class="custom-toggle">
                                                <input type="checkbox" id="statusButton" data-id="' . $gtm->id . '" data-status="' . $gtm->status . '">
                                                    <span class="toggle-slider"></span>
                                            </label>';
                }
            })
            ->addColumn('action', function ($gtm) {
            return
                '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $gtm->id . '" data-bs-toggle="modal" data-bs-target="#Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="#" type="button" id="deleteButton" data-id="' . $gtm->id . '" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash"></i></a>';
            })
            ->rawColumns(['code', 'status', 'action'])
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
        $gtm = new GoogleTagManager();

        $gtm->code = $request->code;
        $gtm->status = $request->status;
        $gtm->save();

        return response()->json($gtm, 200);
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
        $gtm = GoogleTagManager::findOrFail($id);
        return response()->json($gtm, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gtm = GoogleTagManager::findOrFail($id);

        $gtm->code = $request->code;
        $gtm->status = $request->status;
        $gtm->update();

        return response()->json($gtm, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gtm = GoogleTagManager::findOrFail($id);
        $gtm->delete();

        return response()->json($gtm, 200);
    }

    public function statusUpdate($id)
    {
        $gtm = GoogleTagManager::findOrFail($id);

        if ($gtm->status == 1) {
            $gtm->status = 0;
        } elseif ($gtm->status == 0) {
            $gtm->status = 1;
        }

        $gtm->save();

        return response()->json($gtm, 200);
    }
}
