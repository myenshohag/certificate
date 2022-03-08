<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function newsDetails(News $news)
    {
        $data['news'] = $news;
        return view('frontend.news.details', $data);
    }
    public function products($cat = null)
    {
        $data['categories'] =  Category::orderBy('name', 'asc')->with('products')->get();
        // if ($cat == null) {
        //     $data['products']   = Product::orderBy('id', 'desc')->get();
        // } else {
        //     $data['products'] = Product::where('category_id', $cat)->orderBy('id', 'desc')->get();
        // }
        return view('frontend.product.products', $data);
    }
}
