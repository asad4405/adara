<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\SliderImage;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $subcategories = Subcategory::where('status', 1)->get();
        $childcategories = Childcategory::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $colors = Color::where('status', 1)->get();
        $sizes = Size::where('status', 1)->get();
        return view('Backend.pages.product.index', [
            'categories' => $categories,
            'subcategories' => $subcategories,
            'childcategories' => $childcategories,
            'brands' => $brands,
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
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
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->slug = Str::slug($request->product_name);
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->childcategory_id = $request->childcategory_id;
        $product->brand_id = $request->brand_id;
        $product->product_code = $request->product_code;
        $product->purchase_price = $request->purchase_price;
        $product->old_price = $request->old_price;
        $product->new_price = $request->new_price;
        $product->stock = $request->stock;
        $product->color_id = $request->color_id;
        $product->size_id = $request->size_id;
        $product->product_unit = $request->product_unit;
        $product->product_video = $request->product_video;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->hot_product = $request->hot_product ? 1 : 0;
        $product->feature_product = $request->feature_product ? 1 : 0;
        $product->best_selling = $request->best_selling ? 1 : 0;
        $product->status = $request->status ? 1 : 0;

        if ($request->file('product_image')) {
            $product_image = $request->file('product_image');

            $imageName          = microtime('.') . '.' . $product_image->getClientOriginalExtension();
            $imagePath          = 'public/Backend/uploads/product/';
            $product_image->move($imagePath, $imageName);

            $product->product_image   = $imagePath . $imageName;
        }

        $product->save();

        $slider_images = $request->file('slider_image');
        if ($slider_images) {
            foreach ($slider_images as $key => $slider_image) {
                $imageName          = microtime('.') . '.' . $slider_image->getClientOriginalExtension();
                $imagePath          = 'public/Backend/uploads/product_slider/';
                $slider_image->move($imagePath, $imageName);
                $imageUrl = $imagePath . $imageName;

                $slider_image                = new SliderImage();
                $slider_image->product_id    = $product->id;
                $slider_image->slider_image  = $imageUrl;
                $slider_image->save();
            }
        }

        return response()->json($product, 200);
    }

    public function getData()
    {
        $products = Product::all();

        return DataTables::of($products)
            ->addColumn('product_name', function ($product) {
                return $product->product_name;
            })
            ->addColumn('product_image', function ($product) {
                return '<img src="' . asset($product->product_image) . '" alt="" style="width: 65px;">';
            })
            ->addColumn('status', function ($product) {
                if ($product->status == 1) {
                    return '<label class="custom-toggle">
                                <input type="checkbox" checked id="statusButton" data-id="' . $product->id . '" data-status="' . $product->status . '">
                                    <span class="toggle-slider"></span>
                            </label>';
                } else {
                    return '<label class="custom-toggle">
                                <input type="checkbox" id="statusButton" data-id="' . $product->id . '" data-status="' . $product->status . '">
                                    <span class="toggle-slider"></span>
                            </label>';
                }
            })
            ->addColumn('action', function ($product) {
                return
                    '<a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $product->id . '" data-bs-toggle="modal" data-bs-target="#Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="#" type="button" id="deleteButton" data-id="' . $product->id . '" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash"></i></a>';
            })
            ->rawColumns(['product_name', 'product_image', 'status', 'action'])
            ->make(true);
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
        $product = Product::findOrFail($id);
        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $product->product_name = $request->product_name;
        $product->slug = Str::slug($request->product_name);
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->childcategory_id = $request->childcategory_id;
        $product->brand_id = $request->brand_id;
        $product->product_code = $request->product_code;
        $product->purchase_price = $request->purchase_price;
        $product->old_price = $request->old_price;
        $product->new_price = $request->new_price;
        $product->stock = $request->stock;
        $product->color_id = $request->color_id;
        $product->size_id = $request->size_id;
        $product->product_unit = $request->product_unit;
        $product->product_video = $request->product_video;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->hot_product = $request->hot_product ? 1 : 0;
        $product->feature_product = $request->feature_product ? 1 : 0;
        $product->best_selling = $request->best_selling ? 1 : 0;
        $product->status = $request->status ? 1 : 0;
        $product->update();
        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if (!is_null($product->product_image) && file_exists($product->product_image)) {
            unlink($product->product_image);
        }

        // slider images
        $sliderImages = SliderImage::where('product_id', $product->id)->get();
        foreach ($sliderImages as $sliderImage) {
            if (file_exists($sliderImage->slider_image)) {
                unlink($sliderImage->slider_image);
            }
            $sliderImage->delete();
        }
        $product->delete();
        return response()->json($product, 200);
    }

    public function statusUpdate($id)
    {
        $product = Product::findOrFail($id);
        if ($product->status == 1) {
            $product->status = 0;
        } elseif ($product->status == 0) {
            $product->status = 1;
        }

        $product->save();
        return response()->json($product, 200);
    }
}
