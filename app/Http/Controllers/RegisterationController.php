<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Alluser;
use App\models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterationController extends Controller
{
    public function Register() {
        return view('signup');
    }

    public function SaveCustomer(Request $request) {
        $request->validate([
            "username"=>["required", "regex:/^[\pL\s]+$/u"],
            'email' => ['required', 'email', 'unique:allusers'],
            'password' => ['required', 'min:8', 'max:16'],
            'location' => ['required'],
            'phone_number' => ['required' , 'numeric', 'regex:/(01)[0-9]{9}/']
        ]);
        $new_user = new Alluser;
        $new_customer = new Customer;
        $new_user->role = 1;
        $new_user->email = $request->email;
        $new_user->password = Hash::make($request->password);
        $new_user->save();
        $new_customer->user_id = $new_user->id;
        $new_customer->first_name = $request->username;
        $new_customer->last_name = $request->username;
        $new_customer->phone_number = $request->phone_number;
        $new_customer->location = $request->location;
        $new_customer->save();
        // return "done";
        return redirect()->route('login');
    }


    public function Login() {
        return view('login');
    }


    public function CheckLogin(Request $request) {
        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);
        $user = Alluser::where('email', '=', $request->email)->first();
        if(!$user) {
            return redirect()->route('login');
            // return "usernotfound";
        }
        else {
            if($user->role == 1) {
                if(Hash::check($request->password, $user->password)) {
                    $customer_info = Customer::where('user_id', '=', $user->id)->first();
                    $request->session()->put('logged_in_customer', $customer_info);
                    return redirect()->route('home');
                }
                else {
                    return redirect()->route('login');
                }
            }
            else {
                if($request->password == $user->password) {
                    $admin_info = Admin::where('user_id', '=', $user->id)->first();
                    $request->session()->put('logged_in_admin', $admin_info);
                    return redirect()->route('dashboard');
                }
                else {
                    return redirect()->route('login');
                }
            }
        }
    }


    public function Logout() {
        if(session()->has('logged_in_customer')) {
            session()->pull('logged_in_customer');
            return redirect()->route('login');
        }
        if(session()->has('logged_in_admin')) {
            session()->pull('logged_in_admin');
            return redirect()->route('login');
        }
    }
}
