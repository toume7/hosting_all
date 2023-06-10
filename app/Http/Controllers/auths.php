<?php

namespace App\Http\Controllers;

use App\Models\auth;
use App\Models\session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class auths extends Controller
{
    public function reg(Request $request)
    {
        $user_email = auth::where('email', $request['email'])->get();
        if (count($user_email) == 1) {
            if ($user_email[0]['email'] == $request['email']) {
                return view('reg', ['warning' => 1]);
            }
            if ($user_email[0]['phone'] == $request['phone']) {
                return view('reg', ['warning' => 1]);
            }
            if ($request['password'] !== $request['password_request']) {
                return view('reg', ['warning' => 1]);
            }
        }
        $new_user = new auth();
        $new_user['email'] = $request['email'];
        $new_user['name'] = $request['name'];
        $new_user['surname'] = $request['surname'];
        $new_user['phone'] = $request['phone'];
        $new_user['password'] = md5($request['password']);
        $new_user->save();

        $user_email = auth::where('email', $request['email'])->get();
        $session = new session();
        $session['id'] = $user_email[0]['id'];
        $session->save();
        return redirect()->route('welc');
    }

    public function login(Request $request)
    {
        $user_email = auth::where('email', $request['email'])->get();
        if (count($user_email) == 0) {
            return view('auth', ['warning' => 1]);
        }
        if ($user_email[0]['password'] != md5($request['password'])) {
            return view('auth', ['warning' => 1]);
        }
        $session = new session();
        $session['id'] = $user_email[0]['id'];
        $session->save();
        if ($user_email[0]['role']==7){
            return redirect()->route('admin_arend');
        }
        return redirect()->route('welc');
    }

    public function edit_user(Request $request)
    {

        $user = auth::find($request['id']);
        $test = $user['photo'];
        if ($request->file('user')) {

            $file_one = $request->file('user');
            $filename = uniqid() . $file_one->getClientOriginalName();
            $file_one->move(Storage::path('public') . '', $filename);
            $file_one = $filename;

            $user->photo = $file_one;

        }

        if ($request['new_password']) {
            if ($request['new_password'] != $request['repeat_passwrd']) {
                dd('пароли не совпадают');
            }
            if ($user['password'] == md5($request['new_password'])) {

                dd("пароли совпадают");
            }
            $user->email = $request['email'];
            $user->name = $request['name'];
            $user->surname = $request['surname'];
            $user->phone = $request['phone'];
            $user->password = md5($request['new_password']);
        }
        $user->save();

        if (($test != null)) {
            Storage::disk('public')->delete($test);
        }
        return redirect()->route('red_user');
    }

    public function edit_adrend(Request $request)
    {

        $user = auth::find($request['id']);
        $test = $user['photo'];
        $ss = 0;
        if ($request->file('user')) {
            $file_one = $request->file('user');
            $filename = uniqid() . $file_one->getClientOriginalName();
            $file_one->move(Storage::path('public') . '', $filename);
            $file_one = $filename;

            $user->photo = $file_one;
            $ss = 1;
        }

        if ($request['new_password']) {
            if ($request['new_password'] != $request['repeat_passwrd']) {
                dd('пароли не совпадают');
            }
            if ($user['password'] == md5($request['new_password'])) {

                dd("пароли совпадают");
            }
            $user->email = $request['email'];
            $user->name = $request['name'];
            $user->surname = $request['surname'];
            $user->phone = $request['phone'];
            $user->password = md5($request['new_password']);
            $user->series = $request['seria'];
            $user->number = $request['number'];
            $user->date_of_b = $request['date_of_bithday'];
            $user->Date = $request['date_of_vidacha'];
            $user->Unit_code = $request['cod'];
            $user->Who_issued = $request['who'];
            $user->SNILS = $request['SNILC'];
            $user->TIN = $request['INN'];

        }
        $user->save();

        if (($test != null) && ($ss == 1)) {
            Storage::disk('public')->delete($test);
        }
        return redirect()->route('edit_profile_arend');
    }

    public function wait(Request $request)
    {
        $user = auth::find($request['id']);
        $user->series = $request['seria'];
        $user->number = $request['number'];
        $user->date_of_b = $request['date_of_bithday'];
        $user->Date = $request['date_of_vidacha'];
        $user->Unit_code = $request['cod'];
        $user->Who_issued = $request['who'];
        $user->SNILS = $request['SNILC'];
        $user->TIN = $request['INN'];
        $user->role = 1;
        $user->save();
        return redirect()->route('Pu', ['message' => 'заявка поддана']);
    }
}
