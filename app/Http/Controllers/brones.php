<?php

namespace App\Http\Controllers;

use App\Models\auth;
use App\Models\brone;
use App\Models\catalog;
use App\Models\comment;
use App\Models\favorite;
use App\Models\session;
use Illuminate\Http\Request;

class brones extends Controller
{
    public function view(Request $request)
    {
        $room = catalog::find($request['id']);
        $session = session::get();
        if (count($session) == 0) {
            return redirect()->route('auth');
        }
        $brone = brone::all()->where('accept',1);
        $user = auth::all();
        $favorit = favorite::all()->where('id_user', $session[0]['id'])->where('id_room', $room['id']);
        $comm = comment::where('id_room', $room['id'])->get();

        return view('brone', ['room' => $room, 'session' => auth::find($session), 'favorit' => $favorit, 'commets' => $comm, 'message' => 0, 'users' => $user, 'brone' => $brone]);


    }

    public function brone(Request $request)
    {
        $dates = brone::all();
        foreach ($dates as $date) {
            if ((($date['arrivied'] <= $request['date_arraive']) && ($date['Departure'] >= $request['date_departure']))) {

                $room = catalog::find($request['id_room']);
                $session = session::get();
                $favorit = favorite::all()->where('id_user', $session[0]['id'])->where('id_room', $room['id']);
                $comm = comment::where('id_room', $room['id'])->get();
                $brone = brone::all();
                $user = auth::all();
                $message = 'Ваша дата попадает в диапазон уже занятых дат ' . $date['arrivied'] . ' ' . $date['Departure'];

                return view('brone', ['room' => $room, 'session' => auth::find($session), 'favorit' => $favorit, 'commets' => $comm, 'message' => $message, 'users' => $user, 'brone' => $brone]);
            }
        }

        $brone = new brone();
        $brone->id_room = $request['id_room'];
        $brone->guest = $request['guest'];
        $brone->night = $request['night'];
        $brone->price = $request['count'];
        $brone->phone = $request['phone'];
        $brone->arrivied = $request['date_arraive'];
        $brone->Departure = $request['date_departure'];
        $brone->save();

        return redirect()->route('catalog');
    }

    public function accept(Request $request)
    {
        $brone = brone::find($request['id']);
        $brone->accept = 1;
        $brone->save();

        return redirect()->route('admin_arenda_broni');
    }

    public function cancel(Request $request)
    {
        brone::destroy($request['id']);
        return redirect()->route('admin_arenda_broni');
    }
}
