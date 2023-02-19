<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //start user
    public function user()
    {
        $data = User::all();
        return view('admin.users', compact("data"));
    }

    public function userDelete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/users');
    }
    //end user

    //start foodmenu
    public function foodmenu()
    {
        $data = Food::all();
        return view('admin.foodmenu', compact('data'));
    }

    public function foodmenuAdd()
    {
        return view('admin.foodmenuadd');
    }

    public function foodmenuCreate(Request $request)
    {
        $data = new Food;

        $image = $request->image;

        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $imageName);

        $data->image = $imageName;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desc;
        $data->save();

        return redirect("/foodmenu");
    }

    public function foodmenuEdit($id)
    {
        $data = Food::find($id);
        return view('admin.foodmenuedit', compact("data"));
    }

    public function foodmenuUpdate($id,Request $request)
    {
        $data = Food::find($id);

        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $imageName);

        $data->image = $imageName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desc;
        $data->save();

        return redirect("/foodmenu");
    }

    public function foodmenuDelete($id)
    {
        $data = Food::find($id);
        $data->delete();

        return redirect('/foodmenu');
    }
    //end foodmenu

    //start chef
    public function chef()
    {
        $data = Chef::all();
        return view('admin.adminchef', compact("data"));
    }

    public function chefAdd()
    {
        return view('admin.adminchefadd');
    }

    public function chefCreate(Request $request)
    {
        $data = new Chef;

        $image = $request->image;

        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('chefimage', $imageName);

        $data->image = $imageName;

        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();
        return redirect('/chefs');
    }

    public function chefEdit($id)
    {
        $data = Chef::find($id);

        return view('admin.adminchefedit', compact('data'));
    }

    public function chefUpdate($id, Request $request)
    {
        $data = Chef::find($id);

        $image = $request->image;

        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('chefimage', $imageName);

        $data->image = $imageName;

        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();
        return redirect('/chefs');
    }

    public function chefDelete($id)
    {
        $data = Chef::find($id);
        $data->delete();

        return back();
    }
    //end chef

    //start reservation
    public function reservation()
    {
        $data = Reservation::all();
        return view('admin.adminreservation', compact("data"));
    }

    public function reservationCreate()
    {
        $data = new Reservation;
        $data->user_id = auth()->user()->id;
        $data->name = request()->name;
        $data->email = request()->email;
        $data->phone = request()->phone;
        $data->guest = request()->guest;
        $data->date = request()->date;
        $data->time = request()->time;
        $data->message = request()->message;

        $data->save();

        return redirect()->back();
    }
    //end reservation
}
