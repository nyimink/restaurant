<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth')->except("index");
    }

    public function index()
    {
        $data = Food::all();
        $chef = Chef::all();

        if(auth()->user()){
            $user_id = auth()->user()->id;
            $count = Cart::where('user_id', $user_id)->count();
            return view('home', compact('data', 'chef', 'count'));
        }

        return view('home', compact('data', 'chef'));
    }

    public function redirects()
    {
        $data = Food::all();
        $chef = Chef::all();
        $usertype = Auth::user()->usertype;

        if($usertype == '1')
        {
            return view('admin.adminhome');
        } else {

            $user_id = auth()->user()->id;

            $count = Cart::where('user_id', $user_id)->count();
            return view('home', compact('data', 'chef', 'count'));
        }
    }

    public function cartAdd($id, Request $request)
    {
        $data = new Cart;

        $data->user_id = auth()->user()->id;
        $data->food_id = $id;
        $data->quantity = $request->quantity;

        $data->save();

        return back();
    }

    public function cart($id, Request $request)
    {

        $count = Cart::where('user_id', auth()->user()->id)->count();
        // $cart = Cart::all()->where('user_id', auth()->user()->id);
        $data2 = Cart::select('*')->where('user_id', '=', $id)->get();
        $data = Cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();

        return view('cartshow', compact('count', 'data', 'data2'));
    }

    public function cartDelete($id)
    {
        $data = Cart::find($id);

        $data->delete();

        return back();
    }

    public function orderConfirm(Request $request)
    {
        foreach($request->foodname as $key => $foodname)
        {
            $data = new Order;

            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;

            $data->save();
        }

        return back();
    }
}
