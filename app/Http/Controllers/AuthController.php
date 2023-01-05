<?php

namespace App\Http\Controllers;

use App\Models\AddProduct;
use App\Models\RegParkir;
use App\Models\reservasi;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'name' => 'required|min:4',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register-form')->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->saldo = '50000';
        $user->save();
        // User::create([
        //     'email' => $request->email,
        //     'name' => $request->name,
        //     'password' => Hash::make($request->password),
        //     'role' => 'member',
        // ]);

        return redirect()->route('login-form')->with('success', 'Registrasi berhasil, silahkan login.');
    }

    function doregistertempatparkir(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required|integer',
            'detail' => 'required',
            'image' => 'required',
        ]);
        

        if ($validator->fails()) {
            return redirect()->route('pengelola.regparkir')->withErrors($validator)->withInput();
        }

        $addprod = new AddProduct();
        $image = str_replace(' ', '', $request->name) . $request->file('image')->getClientOriginalExtension();
        $request->image->storeAs(
            '\public\\',
            $image
        );
        $addprod->name = $request->name;
        $addprod->price = $request->price;
        $addprod->detail = $request->detail;
        $addprod->image = $image;
        $addprod->save();

        return redirect()->route('pengelola.regparkir')->with('success', 'Registrasi berhasil.');
    }

    function registertrainer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'special' => 'required',
            'detail' => 'required',
            'image' => 'required',
        ]);
        

        if ($validator->fails()) {
            return redirect()->route('pengelola.regparkir')->withErrors($validator)->withInput();
        }

        $addtrainer = new Trainer();
        $image = str_replace(' ', '', $request->name) . $request->file('image')->getClientOriginalExtension();
        $request->image->storeAs(
            '\public\\',
            $image
        );
        $addtrainer->name = $request->name;
        $addtrainer->special = $request->special;
        $addtrainer->detail = $request->detail;
        $addtrainer->image = $image;
        $addtrainer->save();

        return redirect()->route('pengelola.dashboard')->with('success', 'Registrasi berhasil.');
    }

    function createreservasi(Request $request,$id)
    {
        $request -> validate([
            'nokendaraan' => 'required|max:255',
            'tipekendaraan' => 'required',
            'checkindate'=>'required|date',
            'checkintime'=>'required|date_format:H:i',
            'checkoutdate'=>'required|date|after_or_equal:checkindate',
            'checkouttime'=>'required|date_format:H:i|after:checkintime',
            'lamaparkir' => 'required',
            'metodebayar' => 'required',
        ]);
        $users = User::find(Auth::user()->id);
        $users->saldo = $request->saldo;

        $reservasi = new reservasi();
        $reservasi->user_id = Auth::user()->id;
        $reservasi->parkir_id = $id;
        $reservasi->nokendaraan = $request->nokendaraan;
        $reservasi->tipekendaraan = $request->tipekendaraan;
        $reservasi->checkindate = $request->checkindate;
        $reservasi->checkintime = $request->checkintime;
        $reservasi->checkoutdate = $request->checkoutdate;
        $reservasi->checkouttime = $request->checkouttime;
        $reservasi->status = "unconfirmed";
        $reservasi->info = "belummulai";
        $reservasi->lamaparkir = $request->lamaparkir;
        $reservasi->biayatotal = $request->biayatotal;
        $reservasi->metodebayar = $request->metodebayar;

        $reservasi->save();
        $users->save();

        return redirect()->route('user.search')->with('success', 'Registrasi berhasil.');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login-form')->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->route('login-form')->withErrors(['login' => 'email atau password salah!'])->withInput();
        }
        auth()->login($user);

        if($user->role == "member"){
            return redirect()->route('user.homepage');
        }
        if($user->role == "pengelola"){
            return redirect()->route('pengelola.dashboard');
        }
        if($user->role == "admin"){
            return redirect()->route('admin.analytics');
        }
    }
}