<?php

namespace App\Http\Controllers;

use App\Models\RegParkir;
use App\Models\AddProduct;
use App\Models\Order;
use App\Models\reservasi;
use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoadController extends Controller
{
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    function updateprofilepage()
    {
        $user = User::find(Auth::user()->id);
        return view('user.info')->with('user', $user);
    }
    function updateprofilepengelola()
    {
        $user = User::find(Auth::user()->id);
        return view('pengelola.profile')->with('user', $user);
    }
    function regproduct()
    {
        $product = AddProduct::find(Auth::user()->id);

        return view('pengelola.regproduct')->with('product', $product);
    }
    function trainer()
    {
        return view('pengelola.regtrainer');
    }

    function pengelolainfo()
    {
        $parkir = RegParkir::where('user_id', Auth::user()->id)->get();
        return view('pengelola.info')->with('parkir', $parkir);
    }

    function manageproduct(Request $request)
    {
        $search  = $request->search == null ? '' : $request->search;

        $product = AddProduct::where('name', 'like', '%' . $search . '%')->paginate(12);
        // dd($product);

        return view('pengelola.product')->with('product', $product);
    }

    function deleteproduct($id)
    {
        $product = AddProduct::find($id);
        $product->delete();

        return view('pengelola.product');
    }

    function editproduct($id)
    {
        $product = AddProduct::find($id);
        // dd($product);
        return view('pengelola.editproduct')->with('product', $product);
    }

    function detailproduct($id)
    {
        $detail = AddProduct::find($id);
        $user = User::find(Auth::user()->id);
        // dd($product);
        return view('user.detail')->with('detail', $detail)->with('user', $user);
    }

    function usergethome()
    {
        $home = AddProduct::all();

        return view('user.homepage')->with('home', $home);
    }

    function getproduct(Request $request)
    {
        $search  = $request->search == null ? '' : $request->search;

        $product = AddProduct::where('name', 'like', '%' . $search . '%')->paginate(12);

        return view('user.product')->with('product', $product);
    }

    function getuserorder()
    {
        $data = Order::all();

        return view('pengelola.dashboard')->with('data', $data);
    }

    function getrekappengelola()
    {
        $user = User::where('role', '=', 'member')->paginate(10);
        $order = Order::all();
        $trainer = Trainer::all();
        $product = AddProduct::all();

        return view('pengelola.rekap')->with('user',$user)->with('trainer',$trainer)->with('order',$order)->with('product',$product);
    }

    function usergetorder()
    {
        $order = Order::where('user_id', '=', Auth::user()->id)->get();
        // dd($order);

        return view('user.order')->with('order', $order);
    }

    function usergethistory()
    {
        $order = Order::where('user_id', '=', Auth::user()->id)->get();

        return view('user.history')->with('order',$order);
    }
}
