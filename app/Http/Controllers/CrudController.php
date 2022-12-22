<?php

namespace App\Http\Controllers;

use App\Models\RegParkir;
use App\Models\reservasi;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Input\Input;

class CrudController extends Controller
{
    function doupdateprofile(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'password' => 'required',
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('user.info');
    }

    function usertopup (Request $request)
    {
        $request->validate([
            'saldo' => 'required',
        ]);

        $user = User::find($request->id);
        $user->saldo = $request->saldo;

        $user->save();
        return redirect('user/search');
    }

    function pengelolatopup (Request $request)
    {
        $request->validate([
            'saldotarik' => 'required',
        ]);

        $user = User::find($request->id);
        $user->saldo = $request->saldotarik;

        $user->save();
        return redirect('pengelola/dashboard');
    }

    function doupdateprofilepengelola(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'password' => 'required',
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('pengelola.profile');
    }


    function doupdateparkir(Request $request)
    {

        $parkir = RegParkir::where('user_id', Auth::user()->id)->first();
        $request->validate([
            'name' => 'required|max:255',
            'slot' => 'required|integer',
            'slotmaksimal' => 'required|integer',
            'biaya' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'lokasi' => 'required',
        ]);
        if ($request->image) {
            $image = str_replace(' ', '-', $request->name) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->storeAs(
                '\public\\',
                $image
            );

            $parkir->image = $image;
        }

        $parkir->name = $request->name;
        $parkir->slot = $request->slot;
        $parkir->slotmaksimal = $request->slotmaksimal;
        $parkir->biaya = $request->biaya;
        $parkir->latitude = $request->latitude;
        $parkir->longitude = $request->longitude;
        $parkir->lokasi = $request->lokasi;
        $parkir->save();

        return redirect()->route('pengelola.dashboard');
    }

    function pengelolaupdatestatus(Request $request)
    {
        $request->validate([
            'saldo' => 'required',
            'slot' => 'required',
        ]);

        $parkir = RegParkir::find($request->parkir_id);
        $parkir->slot = $request->slot;

        $reserves = reservasi::find($request->id);
        $reserves->status = $request->status;

        $users = User::find(Auth::user()->id);
        $users->saldo = $request->saldo;

        $reserves->info = $request->info;

        $reserves->save();
        $users->save();
        $parkir->save();

        return redirect()->route('pengelola.dashboard');
    }

    function userselesai(Request $request)
    {
        $request->validate([
            'slot' => 'required',
            'saldo' => 'required'
        ]);

        $admin = User::find($request->adminid);
        $admin->saldo = $request->input('saldo');

        $parkir = RegParkir::find($request->parkir_id);
        $parkir->slot = $request->slot;
        
        $reserves = reservasi::find($request->id);
        $reserves->info = $request->info;

        $reserves->save();
        $parkir->save();
        $admin->save();

        return redirect()->route('user.search');
    }

    function adminbatalkanreservasi(Request $request)
    {

        $parkir = RegParkir::find($request->parkir_id);
        $parkir->slot = $request->slot;

        $reserves = reservasi::find($request->id);
        $reserves->info = $request->info;

        $reserves->save();
        $parkir->save();

        return redirect()->route('admin.transaksi');
    }
}
