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
        $parkir = RegParkir::find(Auth::user()->id);

        return view('pengelola.regparkir')->with('parkir', $parkir);
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
    function getparkir()
    {
        $parkir = RegParkir::all();
        return view('map.map')->with('parkir', $parkir);
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
        $home = RegParkir::all();

        return view('user.homepage')->with('home', $home);
    }

    function getproduct(Request $request)
    {
        $search  = $request->search == null ? '' : $request->search;

        $product = AddProduct::where('name', 'like', '%' . $search . '%')->paginate(12);

        return view('user.product')->with('product', $product);
    }

    function getsearchparkir(Request $request)
    {
        $search  = $request->search == null ? '' : $request->search;

        $parkir = RegParkir::where('name', 'like', '%' . $search . '%')
            ->orWhere('lokasi', 'like', '%' . $search . '%')->get();

        return view('map.searchmap')->with('parkir', $parkir);
    }

    function parkirdetail($id)
    {
        $data = RegParkir::find($id);
        return view('map.detail', compact('data', 'id'));
    }

    function doreservasi($id)
    {
        $data = RegParkir::find($id);

        // dd($data);

        return view('map.reservasi', compact('data', 'id'));
    }

    function getuserorder()
    {
        $data = Order::all();

        return view('pengelola.dashboard')->with('data', $data);
    }

    function getdashboardpengelola()
    {
        $reserve = DB::table('reservasis');

        $user = User::find(Auth::user()->id);
        $parkir = reservasi::where('parkir_id', '=', Auth::user()->id)->get();


        // $parkir = reservasi::all()->where('parkir_id', Auth::user()->id);

        $data = $reserve
            ->select('reservasis.*', 'reg_parkirs.slot', 'reg_parkirs.slotmaksimal')
            ->leftJoin('reg_parkirs', 'reg_parkirs.id', 'reservasis.parkir_id')
            ->leftJoin('users', 'users.id', 'reg_parkirs.user_id')
            ->where('parkir_id', '=', Auth::user()->id)
            ->get();

        //   dd($data);

        return view('pengelola.dashboard', ['reservasis' => $data]);
    }

    function getrekappengelola()
    {
        $user = User::where('role', '=', 'member')->get();
        $order = Order::all();
        $trainer = Trainer::all();
        $product = AddProduct::all();

        return view('pengelola.rekap')->with('user',$user)->with('trainer',$trainer)->with('order',$order)->with('product',$product);
    }

    function admingetanalytics()
    {
        $reserve = DB::table('reservasis');

        $data = $reserve
            ->select('reservasis.*', 'reg_parkirs.slot', 'users.saldo')
            ->leftJoin('reg_parkirs', 'reg_parkirs.id', 'reservasis.parkir_id')
            ->leftJoin('users', 'users.id', 'reg_parkirs.user_id')
            ->get();

        //  dd($data);

        return view('admin.analytics', ['analytics' => $data]);
    }

    function admingettransaksi()
    {

        $reserve = DB::table('reservasis');

        $user = User::find(Auth::user()->id);
        $parkir = reservasi::where('parkir_id', '=', Auth::user()->id)->get();


        // $parkir = reservasi::all()->where('parkir_id', Auth::user()->id);

        $data = $reserve
            ->select('reservasis.*', 'reg_parkirs.slot')
            ->leftJoin('reg_parkirs', 'reg_parkirs.id', 'reservasis.parkir_id')
            ->leftJoin('users', 'users.id', 'reg_parkirs.user_id')
            ->get();

        //  dd($data);

        return view('admin.transaksi', ['transaksi' => $data]);
    }

    function admingetsearchtransaksi(Request $request)
    {
        $search  = $request->search == null ? '' : $request->search;
        $reserve = DB::table('reservasis');

        $user = User::find(Auth::user()->id);
        $parkir = reservasi::where('parkir_id', '=', Auth::user()->id)->get();


        // $parkir = reservasi::all()->where('parkir_id', Auth::user()->id);

        $data = $reserve
            ->select('reservasis.*', 'reg_parkirs.slot')
            ->leftJoin('reg_parkirs', 'reg_parkirs.id', 'reservasis.parkir_id')
            ->leftJoin('users', 'users.id', 'reg_parkirs.user_id')
            ->orWhere('reg_parkirs.name', 'like', '%' . $search . '%')
            ->orWhere('users.name', 'like', '%' . $search . '%')
            ->orWhere('biayatotal', 'like', '%' . $search . '%')
            ->get();

        //  dd($data);

        return view('admin.transaksi', ['transaksi' => $data]);
    }

    function admingetuser()
    {
        $data = User::all();

        return view('admin.user')->with('data', $data);
    }

    function admingetpengelola()
    {
        $data = User::all();

        return view('admin.pengelola')->with('data', $data);
    }

    function adminsearchpengelola(Request $request)
    {
        $search  = $request->search == null ? '' : $request->search;
        $data = User::where('name', 'like', '%' . $search . '%')->orWhere('id', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')->get();

        return view('admin.searchpengelola')->with('data', $data)->with('search', $search);
    }

    function adminsearchuser(Request $request)
    {
        $search  = $request->search == null ? '' : $request->search;
        $data = User::where('name', 'like', '%' . $search . '%')->orWhere('id', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')->get();

        return view('admin.searchuser')->with('data', $data)->with('search', $search);
    }
    function usergetorder()
    {
        $order = Order::where('user_id', '=', Auth::user()->id)->get();
        // dd($order);

        return view('user.order')->with('order', $order);
    }
    function usergetreservasi()
    {
        $reserve = DB::table('reservasis');

        $user = User::find(Auth::user()->id);
        $parkir = reservasi::where('user_id', '=', Auth::user()->id)->get();
        // $parkir = reservasi::all()->where('parkir_id', Auth::user()->id);

        $data = $reserve
            ->select('reservasis.*', 'reg_parkirs.name', 'reg_parkirs.image', 'reg_parkirs.lokasi', 'reg_parkirs.slot', 'users.saldo', 'users.name')
            ->leftJoin('reg_parkirs', 'reg_parkirs.id', 'reservasis.parkir_id')
            ->leftJoin('users', 'users.id', 'reservasis.user_id')
            ->where('reservasis.user_id', '=', Auth::user()->id)
            ->get();

        //dd($data);

        return view('user.search', ['reservasis' => $data]);
    }

    function usergethistory()
    {
        $order = Order::where('user_id', '=', Auth::user()->id)->get();

        return view('user.history')->with('order',$order);
    }

    function admingetriwayat()
    {
        $reserve = DB::table('reservasis');

        $user = User::find(Auth::user()->id);
        $parkir = reservasi::where('user_id', '=', Auth::user()->id)->get();


        // $parkir = reservasi::all()->where('parkir_id', Auth::user()->id);

        $data = $reserve
            ->select('reservasis.*', 'reg_parkirs.name', 'reg_parkirs.slot', 'reg_parkirs.lokasi')
            ->leftJoin('reg_parkirs', 'reg_parkirs.id', 'reservasis.parkir_id')
            ->leftJoin('users', 'users.id', 'reg_parkirs.user_id')
            ->get();

        //   dd($data);

        return view('admin.riwayat', ['riwayat' => $data]);
    }

    function adminsearchriwayat(Request $request)
    {
        $search  = $request->search == null ? '' : $request->search;
        $reserve = DB::table('reservasis');

        $user = User::find(Auth::user()->id);
        $parkir = reservasi::where('user_id', '=', Auth::user()->id)->get();


        // $parkir = reservasi::all()->where('parkir_id', Auth::user()->id);

        $data = $reserve
            ->select('reservasis.*', 'reg_parkirs.name', 'reg_parkirs.slot', 'reg_parkirs.lokasi')
            ->leftJoin('reg_parkirs', 'reg_parkirs.id', 'reservasis.parkir_id')
            ->leftJoin('users', 'users.id', 'reg_parkirs.user_id')
            ->orWhere('reg_parkirs.name', 'like', '%' . $search . '%')
            ->orWhere('users.name', 'like', '%' . $search . '%')
            ->orWhere('biayatotal', 'like', '%' . $search . '%')
            ->get();

        //   dd($data);

        return view('admin.searchriwayat', ['riwayat' => $data]);
    }
}
