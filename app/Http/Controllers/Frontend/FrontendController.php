<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
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
}
