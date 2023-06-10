<?php

namespace App\Http\Controllers;

use App\Models\auth;
use App\Models\brone;
use App\Models\catalog;
use App\Models\comment;
use App\Models\favorite;
use App\Models\session;
use Illuminate\Http\Request;

class favorites extends Controller
{
    public function add(Request $request)
    {
        $fav = new favorite();
        $fav->id_user = $request['id_user'];
        $fav->id_room = $request['id_room'];
        $fav->save();

        $room = catalog::find($request['id_room']);
        $session = session::get();
        $comm = comment::where('id_room', $room['id'])->get();
        $favorit = favorite::all()->where('id_user', $session[0]['id'])->where('id_room', $room['id']);
        $brone = brone::all();
        if (count($request->request) == 4) {
            return redirect()->route('catalog');
        } else {
            $user = auth::all();
            return view('brone', ['room' => $room, 'message' => 0, 'session' => auth::find($session), 'favorit' => $favorit, 'commets' => $comm, 'users' => $user, 'brone' => $brone]);
        }

    }

    public function del(Request $request)
    {

        $fav_del = favorite::all()->where('id_user', $request['id_user'])->where('id_room', $request['id_room']);
        foreach ($fav_del as $r) {
            favorite::destroy($r['id']);
        }


        $room = catalog::find($request['id_room']);
        $session = session::get();
        $favorit = favorite::all()->where('id_user', $session[0]['id'])->where('id_room', $room['id']);
        $comm = comment::where('id_room', $room['id'])->get();
        $brone = brone::all();
        if (count($request->request) == 4) {
            return redirect()->route('catalog');
        } else {
            $user = auth::all();
            return view('brone', ['room' => $room, 'message' => 0, 'session' => auth::find($session), 'favorit' => $favorit, 'commets' => $comm, 'users' => $user, 'brone' => $brone]);
        }

    }
}
