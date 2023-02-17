<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
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
}
