<?php

namespace App\Http\Controllers;

use App\Models\catalog;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class catalogs extends Controller
{
    public function add(Request $request)
    {
        $room = new catalog();
        $room->id_user = $request['id_user'];
        $room->name = $request['name'];
        $room->type = $request['room'];
        $room->floor = $request['Floor'];
        $room->count_room = $request['rooms'];
        $room->place = $request['area'];
        $room->balcon = $request['balcon'];
        $room->lodg = $request['lodg'];
        $room->Air_conditioning = $request['Air_conditioning'];
        $room->Refrigerator = $request['Refrigerator'];
        $room->Plate = $request['Plate'];
        $room->Microwave = $request['Microwave'];
        $room->Washing_machine = $request['Washing_machine'];
        $room->Dishwasher = $request['Dishwasher'];
        $room->Water_heater = $request['Water_heater'];
        $room->TV = $request['TV'];
        $room->hair_dryer = $request['hair_dryer'];
        $room->Iron = $request['Iron'];
        $room->Television = $request['Television'];
        $room->Wi_Fi = $request['Wi_Fi'];
        $room->Maximum_guests = $request['max_guest'];
        $room->children = $request['children'];
        $room->animals = $request['animals'];
        $room->smoke = $request['smoke'];
        $room->description = $request['description'];
        $room->fee = $request['arenda'];
        $room->Extra_charge = $request['premium'];
        $i = 0;
        while ($i <= 5) {
            $i++;
            if ($request->file('photo' . $i) != null) {
                $file_one = $request->file('photo' . $i);
                $filename = uniqid() . $file_one->getClientOriginalName();
                $file_one->move(Storage::path('public') . '', $filename);
                $file_one = $filename;
                $name = 'photo' . $i;
                $room->$name = $file_one;

            }

        }
        $room->save();
        return redirect()->route('welc');

    }

    public function del_room(Request $request)
    {
        catalog::destroy($request['id']);
        $comm=comment::all()->where('id_room',$request['id']);
        foreach ($comm as $com){
            comment::destroy($com['id']);
        }
        return redirect()->route('Pa');
    }
}
