<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Backend.pages.general_setting.index');
    }

    public function getData()
    {
        $general_settings = GeneralSetting::all();
        return DataTables::of($general_settings)
            ->addColumn('name', function ($general_setting) {
                return $general_setting->name;
            })
            ->addColumn('white_logo', function ($general_setting) {
                return '<img src="' . asset($general_setting->white_logo) . '" alt="" style="width: 65px;">';
            })
            ->addColumn('dark_logo', function ($general_setting) {
                return '<img src="' . asset($general_setting->dark_logo) . '" alt="" style="width: 65px;">';
            })
            ->addColumn('favicon', function ($general_setting) {
                return '<img src="' . asset($general_setting->favicon) . '" alt="" style="width: 65px;">';
            })
            ->addColumn('wp_number', function ($general_setting) {
                return $general_setting->wp_number;
            })
            ->addColumn('action', function ($general_setting) {
                return '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $general_setting->id . '" data-bs-toggle="modal" data-bs-target="#Edit">Edit</a>';
            })
            ->rawColumns(['name', 'white_logo', 'dark_logo', 'favicon', 'action'])
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
        //
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
        $general_setting = GeneralSetting::findOrFail($id);
        return response()->json($general_setting, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $general_setting = GeneralSetting::findOrFail($id);
        $general_setting->name = $request->name;
        $general_setting->wp_number = $request->wp_number;
        $general_setting->messenger = $request->messenger;
        $general_setting->copyright = $request->copyright;
        $general_setting->description = $request->description;
        $general_setting->status = 1;
        $general_setting->created_at = Carbon::now();
        $general_setting->updated_at = Carbon::now();

        if ($request->file('white_logo')) {
            $white_logo = $request->file('white_logo');

            if (!is_null($general_setting->white_logo) && file_exists($general_setting->white_logo)) {
                unlink($general_setting->white_logo);
            }

            $imageName          = microtime('.') . '.' . $white_logo->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/general_setting/white_logo/';
            $white_logo->move($imagePath, $imageName);

            $general_setting->white_logo   = $imagePath . $imageName;
        }

        if ($request->file('dark_logo')) {
            $dark_logo = $request->file('dark_logo');

            if (!is_null($general_setting->dark_logo) && file_exists($general_setting->dark_logo)) {
                unlink($general_setting->dark_logo);
            }

            $imageName          = microtime('.') . '.' . $dark_logo->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/general_setting/dark_logo/';
            $dark_logo->move($imagePath, $imageName);

            $general_setting->dark_logo   = $imagePath . $imageName;
        }

        if ($request->file('favicon')) {
            $favicon = $request->file('favicon');

            if (!is_null($general_setting->favicon) && file_exists($general_setting->favicon)) {
                unlink($general_setting->favicon);
            }

            $imageName          = microtime('.') . '.' . $favicon->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/general_setting/favicon/';
            $favicon->move($imagePath, $imageName);

            $general_setting->favicon   = $imagePath . $imageName;
        }

        $general_setting->update();

        return response()->json($general_setting, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
