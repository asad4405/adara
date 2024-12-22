<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Backend.pages.social_media.index');
    }

    public function getData()
    {
        $social_medias = SocialMedia::all();
        return DataTables::of($social_medias)
            ->addColumn('name', function ($social_media) {
                return $social_media->name;
            })
            ->addColumn('icon', function ($social_media) {
                return $social_media->icon;
            })
            ->addColumn('link', function ($social_media) {
                return $social_media->link;
            })
            ->addColumn('color', function ($social_media) {
                return $social_media->color;
            })
            ->addColumn('status', function ($social_media) {
                if ($social_media->status == 1) {
                    return '<span style="cursor: pointer;" class="text-white btn bg-success" id="statusButton" data-id="' . $social_media->id . '"status-id="' . $social_media->status . '">Active</span>';
                } else {
                    return '<span style="cursor: pointer;" class="text-white btn bg-danger" id="statusButton" data-id="' . $social_media->id . '" data-status="' . $social_media->status . '">Deactive</span>';
                }
            })
            ->addColumn('action', function ($social_media) {
                return
                    '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $social_media->id . '" data-bs-toggle="modal" data-bs-target="#Edit">Edit</a>
                <a href="#" type="button" id="deleteButton" data-id="' . $social_media->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->rawColumns(['name', 'icon', 'link', 'color', 'status', 'action'])
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
        $social_media = new SocialMedia();

        $social_media->name = $request->name;
        $social_media->icon = $request->icon;
        $social_media->link = $request->link;
        $social_media->color = $request->color;
        $social_media->status = $request->status;
        $social_media->created_at = Carbon::now();

        $social_media->save();

        return response()->json($social_media, 200);
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
        $social_media = SocialMedia::findOrFail($id);
        return response()->json($social_media, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $social_media = SocialMedia::findOrFail($id);

        $social_media->name = $request->name;
        $social_media->icon = $request->icon;
        $social_media->link = $request->link;
        $social_media->color = $request->color;
        $social_media->status = $request->status;

        $social_media->update();

        return response()->json($social_media, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $social_media = SocialMedia::findOrFail($id);
        $social_media->delete();
        return response()->json($social_media, 200);
    }

    public function statusUpdate($id)
    {
        $social_media = SocialMedia::findOrFail($id);

        if ($social_media->status == 1) {
            $social_media->status = 0;
        } elseif ($social_media->status == 0) {
            $social_media->status = 1;
        }

        $social_media->save();

        return response()->json($social_media, 200);
    }
}
