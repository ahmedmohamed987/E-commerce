<?php

namespace App\Http\Controllers;

use App\Models\Creditcard;
use App\Models\Order;
use App\Models\Shoppingcart;
use App\Models\Product;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    public function showcart() {
        $cart = Shoppingcart::where('customer_id', '=', session('logged_in_customer')['id'])
        ->join('products', 'shoppingcarts.product_id', '=', 'products.id')
        ->get();
        // dd($cart);
        $cart_total_price = 0;
        foreach($cart as $item) {
            $cart_total_price += $item->total_price;
        }
        return view('Customer.shoppingcart')->with('cartproducts', $cart)->with('totalcost', $cart_total_price);
    }


    public function addtocart($id) {
        $product = Product::find($id);
        $cart = Shoppingcart::where('customer_id', '=', Session('logged_in_customer')['id'])->where('Product_id', '=', $id)->get();
        // dd($cart);
        // if($cart->isEmpty()) {
        //     $cart = new Shoppingcart;
        //     $cart->customer_id = session('logged_in_customer')['id'];
        //         $cart->product_id = $id;
        //         $cart->total_price = $product->price;
        //         $cart->product_quantity = 1;
        //         $cart->save();
        //         $product->quantity--;
        //         $product->save();
        //         return redirect()->route('shoppingcart');

        // }
        // else {
        //     foreach($cart as $item) {
        //         if($item->product_id == $id) {
        //             $item->product_quantity++;
        //             $item->total_price += $product->price;
        //             $item->save();
        //             $product->quantity--;
        //             $product->save();
        //         }
        //     }
        //     return redirect()->route('shoppingcart');
        // }
        if (sizeof($cart) == 0){
            // return "item doesn't exist";
            $cart = new Shoppingcart;
            $cart->customer_id = session('logged_in_customer')['id'];
            $cart->product_id = $id;
            $cart->total_price = $product->price;
            $cart->product_quantity = 1;
            $cart->save();
            $product->quantity--;
            $product->save();
            // dd($cart);
            return redirect()->route('shoppingcart');
        }
        else {
            $cart[0]->product_quantity++;
            $cart[0]->total_price += $product->price;
            $cart[0]->save();
            return redirect()->route('shoppingcart');
        }



        
        // $cart = Shoppingcart::where('Product_id', '=', $id)
        // ->join('products', 'shoppingcarts.product_id', '=', 'products.id')
        // ->get();
        // dd($cart);
        // if($cart == Null ) {
        //     $cart = new Shoppingcart;
        //     $cart->customer_id = session('logged_in_customer')['id'];
        //     $cart->product_id = $id;
        //     $cart->total_price = $product->price;
        //     $cart->product_quantity = 1;
        //     $cart->save();
        //     $product->quantity--;
        //     $product->save();
        //     // dd($cart);
        //     return redirect()->route('shoppingcart');
        // }
        // else{
            // $cart[0]->product_quantity++;
            // $cart[0]->total_price += $product->price;
            // // $cart[0]->quantity--;
            // $cart[0]->save();
            // dd($cart);
        // }

        // foreach($cart as $item) {
        //     if($item->product_id == $product->id) {
        //         $item->product_quantity++;
        //         $item->total_price += $product->price;
        //         $item->save();
        //         dd($item);
        //         $product->quantity--;
        //         $product->save();
        //         // return redirect()->route('shoppingcart');
        //     }
            // else {
            //     $cart = new Shoppingcart;
            //     $cart->customer_id = session('logged_in_customer')['id'];
            //     $cart->product_id = $id;
            //     $cart->total_price = $product->price;
            //     $cart->product_quantity = 1;
            //     $cart->save();
            //     $product->quantity--;
            //     $product->save();
            //     return redirect()->route('shoppingcart')->withFragment('product');
            // }
        // }
    }


    public function RemoveItemFromCart($id) {
        $removed_item = Shoppingcart::where('product_id', '=', $id);
        $removed_item->delete();
        $product = Product::find($id);
        $product->quantity++;
        $product->save();
        return back();
    }


    public function payment() {
        return view('Customer.creditcard');
    }


    public function checkout(Request $request) {
        $request->validate([
            'card_name' => ['required'],
            'card_number' => ['required'],
            'cvv'=> ['required'],
            'expiry_date' => ['required']
        ]);
        $creditcard = new Creditcard;
        $creditcard->customer_id = session('logged_in_customer')['id'];
        $creditcard->card_name = $request->card_name;
        $creditcard->card_number = $request->card_number;
        $creditcard->cvv = $request->cvv;
        $creditcard->expiry_date = $request->expiry_date;
        $creditcard->save();
        // return "Order has been submited";
        $cart = Shoppingcart::where('customer_id', '=', session('logged_in_customer')['id'])
        ->join('products', 'shoppingcarts.product_id', '=', 'products.id')
        ->get();
        // dd($cart);
        $cart_total_price = 0;
        foreach($cart as $item) {
            $cart_total_price += $item->total_price;
        }
        // $order_details->shoppingcart_id = ;
        $i=0;
        foreach($cart as $prod[$i]) {
            $order_details = new Order;
            $order_details->payment_type = "creditcard" ;
            $order_details->shipping = 20;
            $order_details->order_cost = $cart_total_price ;
            $order_details->customer_id = session('logged_in_customer')['id'];
            $order_details->product_id = $prod[$i]->product_id;
            $order_details->save();
            // dd($prod[$i]);
            $i++;
        }
        // return "order saved successfully";
        $cartitems = Shoppingcart::where('customer_id', '=', session('logged_in_customer')['id'])->get();
        foreach($cartitems as $item) {
            $item->delete();
        }
        // return "item removed";
        return redirect()->route('home')->with('submit_order',"");
        // return redirect()->route('home');
    }
}

