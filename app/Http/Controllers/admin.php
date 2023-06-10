<?php

namespace App\Http\Controllers;

use App\Models\auth;
use App\Models\catalog;
use App\Models\session;
use Illuminate\Http\Request;

class admin extends Controller
{
    public function view(Request $request)
    {
        return view('admin_stranizha_arendodatelia', ['user' => auth::find($request->id)]);
    }

    public function accept(Request $request)
    {

        $user = auth::find($request->id);
        $user->role = 2;
        $user->save();
        return redirect()->route('admin_arendodateli');
    }

    public function cancel(Request $request)
    {
        $user = auth::find($request->id);
        $user->role = 0;
        $user->save();
        return redirect()->route('admin_arendodateli');
    }

    public function brone_view(Request $request)
    {
        $room = catalog::find($request['id_room']);
        return view('brone_admin', ['room' => $room]);
    }

    public function brone_accept(Request $request)
    {

        $room = catalog::find($request->id_room);
        $room->accept = 1;
        $room->save();
        return redirect()->route('admin_arend');
    }

    public function brone_cancel(Request $request)
    {
        $user = auth::find($request->id_room);
        dd($user);
        $user->role = 0;
        $user->save();
        return redirect()->route('admin_arend');
    }

    public function arenda_cancel(Request $request)
    {
        catalog::destroy($request->id_room);
        return redirect()->route('admin_arend');
    }
}
