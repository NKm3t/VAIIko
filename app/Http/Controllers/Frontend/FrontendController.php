<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products'));
    }

    public function fcategory()
    {
        $fcategory = Category::where('status', '0')->get();
        return view('frontend.fcategory', compact('fcategory'));
    }

    public function viewfcategory($id)
    {
        $category = Category::find($id);
        $products = Product::where('cate_id', $category->id)->where('status', '0')->get();
        return view('frontend.products.index', compact('category', 'products'));
    }
}
