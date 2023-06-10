<?php

namespace App\Http\Controllers;

use App\Models\auth;
use App\Models\brone;
use App\Models\catalog;
use App\Models\comment;
use App\Models\favorite;
use App\Models\session;
use Illuminate\Http\Request;

class comments extends Controller
{
    public function add(Request $request)
    {
        $comment = new comment();
        $comment->id_user = $request['id_user'];
        $comment->id_room = $request['id_room'];
        $comment->text = $request['text'];
        $comment->rating = $request['rating'];
        $comment->date = $request['date'];
        $comment->save();

        $count = comment::all()->where('id_room', $request['id_room']);
        $room = catalog::find($request['id_room']);
        $count = count($count);
        $room->count_comments = $room['count_comments'] + $request['rating'];
        $room->rating = $room['count_comments'] / $count;
        $room->save();

        $room = catalog::find($request['id_room']);
        $session = session::get();

        $favorit = favorite::all()->where('id_user', $session[0]['id'])->where('id_room', $room['id']);
        $comm = comment::where('id_room', $room['id'])->get();

        $user = auth::all();
        $brone = brone::all();
        return view('brone', ['room' => $room, 'session' => auth::find($session), 'favorit' => $favorit, 'commets' => $comm, 'message' => 0, 'users' => $user, 'brone' => $brone]);
    }
}
