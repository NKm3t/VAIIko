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

    public function viewfcategory($slug)
    {
        if (Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'products'));
        }
        else {
            return redirect('/')->with('status', "Slug je neplatny");
        }
    }

    public function productview($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists())
        {
            if (Product::where('slug', $prod_slug)->exists())
            {
                $products = Product::where('slug', $prod_slug)->first();
                return view('frontend.products.view', compact('products'));
            }
            else {
                return redirect('/')->with('status', "Link je neplatny");
            }
        }
        else {
            return redirect('/')->with('status', "Link je neplatny");
        }
    }

}
