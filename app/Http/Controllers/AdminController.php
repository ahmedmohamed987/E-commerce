<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Alluser;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function ShowAllCustomer() {
        $all_customers = Customer::orderBy('id','DESC')->paginate(10);
        $all_emails = Alluser::where('role','=', 1)->orderBy('id','DESC')->get();
        return View('Admin.customers',['customers'=>$all_customers], ['emails' => $all_emails]);
    }


    public function ShowRecentCustomer() {
        // $all_customers = Customer::latest(5);
        $customers = 0;
        $all_customers = Customer::all();
        foreach($all_customers as $customer) {
            $customers++;
        }

        $products = 0;
        $allproducts = Product::all();
        foreach($allproducts as $product) {
            $products++;
        }

        $orders = 0;
        $all_orders = Order::all();
        foreach($all_orders as $order) {
            $orders++;
        }

        $all_customers = Customer::latest()->take(5)->get();
        $all_emails = Alluser::where('role','=', 1)->orderBy('id','DESC')->get();
        $all_products = Product::latest()->take(5)->get();
        return View('Admin.dashboard',['customer'=>$all_customers], ['emails' => $all_emails])
                    ->with('products', $all_products)
                    ->with('number_of_customers', $customers)
                    ->with('number_of_products', $products)
                    ->with('number_of_orders', $orders);
    }


    public function DeleteCustomer($id) {
        $deleted_customer = Customer::find($id);
        $deleted_customer->delete();
        return back();
    }


    public function AddProduct(Request $request){
    $request->validate([
        'name'=> ['required'],
        'category'=> ['required'],
        'quantity' => ['required'],
        'price' => ['required'],
        'description' => ['required'],
        'img' => ['required']
    ]);
        $new_product = new Product;
        $new_product->name = $request->name;
        $new_product->quantity = $request->quantity;
        $new_product->price = $request->price;
        $new_product->description = $request->description;
        $new_product->categore = $request->category;
        $product_img_name = time(). '.' . $request->img->extension();
        $product_img_path = "/products/" . $product_img_name;
        $request->img->move(public_path('products'), $product_img_name);
        $new_product->image = $product_img_path;

        $new_product->save();
        return redirect()->route('all.products');
    }


    public function ShowProduct() {
        $products = Product::orderBy('id','DESC')->paginate(5);
        return view('Admin.products', ['products'=>$products]);

    }


    public function DeleteProduct($id) {
        $deleted_product = Product::find($id);
        $deleted_product->delete();
        return back();
    }


    public function AllOrders() {
        $allorders = Customer::join('orders', 'orders.customer_id', '=', 'customers.id')->get();
        // dd($allorders);
        return view('Admin.orders')->with('orders', $allorders);
    }


    public function showordereceipt($id) {
        $order = Order::find($id);
        $customer = Customer::where('id', '=', $order->customer_id)->get();
        return view('Admin.receipt')->with('cust', $customer)->with('ord', $order);
    }

}
