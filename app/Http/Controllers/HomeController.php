<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function search(Request $request) {
        $request->validate([
            'product_name' => 'required'
        ]);
        $product = $request->product_name;
        if($request->filter_value == 'high') {
            $results = Product::where('name', 'like', '%'.$request->product_name.'%')->orderBy('price', 'DESC')->get();
            return view('Customer.results',compact('product'))->with('products', $results);
        }
        elseif($request->filter_value == 'low') {
            $results = Product::where('name', 'like', '%'.$request->product_name.'%')->orderBy('price', 'ASC')->get();
            return view('Customer.results',compact('product'))->with('products', $results);
        }
        else {
            $results = Product::where('name','like','%'.$request->product_name.'%')->get();
            return view('Customer.results',compact('product'))->with('products', $results);
        }
    }


    public function showproducts() {
        $skincare_products = Product::where('categore', '=', 'skincare')->get();
        $watches = Product::where('categore', '=', 'watch')->get();
        $tvs = Product::where('categore', '=', 'Tv')->get();
        $makeup = Product::where('categore', '=', 'makeup')->get();
        return view('Customer.home')->with('skincareproducts', $skincare_products)
                ->with('watches', $watches)->with('tvs', $tvs)
                ->with('makeup', $makeup);
    }


    public function showproductdetails($id) {
        $product = Product::find($id);
        return view('Customer.product')->with('product_details', $product);
    }

}
