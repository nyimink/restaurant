<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data = Food::all();
        $chef = Chef::all();
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
            return view('home', compact('data', 'chef'));
        }
    }
}
