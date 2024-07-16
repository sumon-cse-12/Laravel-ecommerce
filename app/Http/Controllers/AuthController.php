<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;


class AuthController extends Controller
{
    public function login(Request $request){
        return view('frontend.auth.login');
    }
    public function logout(){
        auth('customer')->logout();
        return redirect()->route('front.login')
        ->with('success', 'Logout successfully');
    }
    public function registration(){
        return view('frontend.auth.register');
    }
    public function register(Request $request){

        $request->validate([
            'phone_number'=> 'required',
            'password'=> 'required',
            'cpassword'=> 'required',
        ]);
        if($request->password != $request->cpassword){

            return back()->withErrors(['msg' => 'Invalid email or password. Please try again.']);
        }
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;
        $customer->password = Hash::make($request->password);
        $customer->save();
        return redirect()->route('front.login')
        ->with('success', 'Congratulations !! Registered');
        // return redirect()->back()->with('success', 'Congratulations !! Registered');

    }
    public function authenticate(Request $request){
        $credentials = [
            'phone_number' => $request['phone_number'],
            'password' => $request['password'],
        ];

        if(Auth::guard('customer')->attempt($credentials)){
            if($request->checkout_process=='process=ready-to-checkout'){
                return redirect()->route('front.checkout.cart');

            }else if($request->checkout_process=='process=ready-to-add-to-cart'){

                return redirect()->route('front.checkout.cart');
            } else{
                return redirect()->route('front.profile');
            }
        }
        else{
             return back()->withErrors(['message'=>'Invalid email or password. Please try again.']);
        }
    }

    public function profile(){
        return view('frontend.auth.profile');
    }
    public function profile_update(Request $request){
           $customer = Customer::findOrFail($request->customer_id);
           $customer->first_name = $request->first_name;
           $customer->last_name = $request->last_name;
           $customer->email = $request->email;
           if ($request->password){
            $customer->password = bcrypt($request->password);
           }
           $customer->phone_number = $request->phone_number;
           $customer->save();
           return redirect()->back()->with('success','Profile successfully update');
    }
}
