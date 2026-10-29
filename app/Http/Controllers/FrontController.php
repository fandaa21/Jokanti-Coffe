<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Product;

class FrontController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $about = About::all();
        return view('front.index', compact('product', 'about'));
    }

    public function AboutUs()
    {
        $about = About::all();
        return view('front.AboutUs', compact('about'));
    }

    public function menu()
    {
        $product = product::all();
        $about = About::all();
        return view('front.menu', compact('product', 'about'));
    }

}
