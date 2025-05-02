<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Contact;
use App\Models\ContactUs;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\SliderImage;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $banners = Banner::where('category_id',1)->where('status',1)->get();
        $social_medias = SocialMedia::where('status',1)->get();
        $categories = Category::where('status',1)->latest()->get();
        $products = Product::where('status',1)->latest()->get();
        $trending_products = Product::where(['status' => 1, 'feature_product' => 1])->get();
        return view('Frontend.pages.index',compact('banners', 'social_medias','categories', 'products', 'trending_products'));
    }

    public function product_details($slug)
    {
        $product = Product::where('slug',$slug)->first();
        $product_sliders = SliderImage::where('product_id',$product->id)->get();
        return view('Frontend.pages.product_details',compact('product', 'product_sliders'));
    }

    public function shop()
    {
        $products = Product::where('status', 1)->inRandomOrder()->get();
        $new_products = Product::where('status', 1)->latest()->take(3)->get();
        $categories = Category::where('status', 1)->latest()->get();

        $product_colors = Inventory::select('color_id', \DB::raw('count(*) as total'))
            ->groupBy('color_id')
            ->with('color')
            ->get();

        $product_sizes = Inventory::select('size_id', \DB::raw('count(*) as total'))
            ->groupBy('size_id')
            ->with('color')
            ->get();

        return view('Frontend.pages.shop', compact('products', 'new_products', 'categories', 'product_colors', 'product_sizes'));
    }

    public function contact()
    {
        $contact = Contact::first();
        return view('Frontend.pages.contact',compact('contact'));
    }

    public function contact_submit(Request $request)
    {
        $contact_us = new ContactUs();
        $contact_us->name    = $request->name;
        $contact_us->email   = $request->email;
        $contact_us->phone   = $request->phone;
        $contact_us->adress  = $request->adress;
        $contact_us->message = $request->message;

        $contact_us->save();
        return back()->with('success','Message send Success!');
    }
}
