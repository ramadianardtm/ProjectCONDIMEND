<?php

namespace App\Http\Controllers;

use App\Models\AddProduct;
use App\Models\Order;
use App\Models\RegParkir;
use App\Models\reservasi;
use App\Models\Trainer;
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

    function updateproduct(Request $request, $id)
    {
        $product = AddProduct::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|integer',
            'detail' => 'required',
            'trainer' => 'required',
        ]);
        if ($request->image) {
            $image = str_replace(' ', '-', $request->name) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->storeAs(
                '\public\\',
                $image
            );

            $product->image = $image;
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->trainer = $request->trainer;
        $product->detail = $request->detail;
        $product->save();

        return redirect()->route('pengelola.dashboard');
    }

    function updatetrainer(Request $request, $id)
    {
        $trainer = Trainer::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'detail' => 'required',
            'special' => 'required',
        ]);
        if ($request->image) {
            $image = str_replace(' ', '-', $request->name) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->storeAs(
                '\public\\',
                $image
            );

            $trainer->image = $image;
        }

        $trainer->name = $request->name;
        $trainer->detail = $request->detail;
        $trainer->special = $request->special;

        $trainer->save();

        return redirect()->route('pengelola.dashboard');
    }

    function updatecustomer(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('pengelola.managecustomers');
    }

    function pengelolaupdate (Request $request)
    {
        $order = Order::find($request->id);
        $order->status = $request->status;
        $order->info = $request->info;
        $order->save();

        return redirect()->route('pengelola.dashboard');
    }

    function booknow(Request $request, $id)
    {
        $request->validate([
            'price' => ['required'],
        ]);

        $order = new Order();
        $order->user_id = $request->user_id;
        $order->trainer_id = $request->trainer_id;
        $order->product_id = $id;
        $order->status = "unconfirmed";
        $order->info = "belummulai";
        $order->price = $request->price;
        $order->save();

        return redirect()->route('user.product');

    }

    function orderselesai(Request $request)
    {
        $order = Order::find($request->id);
        $order->info = $request->info;
        $order->save();

        return redirect()->route('user.order');
    }
}
