<?php

use App\Models\comment;
use Illuminate\Support\Facades\Route;
use App\Models\session;
use App\Models\auth;
use App\Models\catalog;
use App\Models\favorite;
use App\Models\brone;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $session = session::all();
    $popular = catalog::orderBy('rating', 'DESC')->where('accept', 1)->get();
    return view('welcome', ['session' => auth::find($session), 'populars' => $popular]);
})->name('welc');

Route::get('catalog', function () {
    $session = session::all();
    $favorite = favorite::all()->where('id_user', $session[0]['id']);
    $popular = catalog::orderBy('rating', 'DESC')->where('accept', 1)->get();
    $user=auth::all();
    return view('catalog', ['session' => auth::find($session), 'rooms' => catalog::all()->where('accept',1), 'favorit' => $favorite, 'populars' => $popular,'users'=>$user]);
})->name('catalog');

Route::get('fav', function () {
    $session = session::all();
    $favorite = favorite::all()->where('id_user', $session[0]['id']);
    return view('faivorit', ['session' => auth::find($session), 'rooms' => catalog::all(), 'favorit' => $favorite]);
})->name('faivorit');

Route::get('home', function () {
    $session = session::destroy(session::all());
    return redirect()->route('welc');
})->name('logout');

Route::get('Auth', function () {
    return view('auth', ['warning' => 0]);
})->name('auth');

Route::get('registration', function () {
    return view('reg', ['warning' => 0]);
})->name('registration');

Route::get('profile_user', function () {
    $session = session::all();
    $fav = favorite::all()->where('id_user', $session[0]['id']);
    $rooms = catalog::all();
    $comm = comment::all()->where('id_user', $session[0]['id']);
    $user=auth::where('id',$session[0]['id'])->get();
    $brone=brone::all()->where('phone',$user[0]['phone']);
    return view('profile_user', ['session' => auth::find($session), 'message' => '', 'fav' => $fav, 'rooms' => $rooms, 'commets' => $comm,'brones'=>$brone]);
})->name('Pu');


Route::get('edit_profile', function () {
    $session = session::all();
    return view('red_profile', ['session' => auth::find($session)]);
})->name('red_user');




Route::get('add_arendadatel', function () {
    $session = session::all();
    return view('add_arendadatel', ['session' => auth::find($session)]);
})->name('form_add_arenda');

//Арендодатель
Route::get('profile_arend', function () {
    $session = session::all();
    $room_accept = catalog::all()->where('id_user', $session[0]['id'])->where('accept', '=', '1');
    $room_wait = catalog::all()->where('id_user', $session[0]['id'])->where('accept', '=', 0);
    $comment = comment::all();
    return view('profile_arend', ['session' => auth::find($session), 'message' => '', 'room_accept' => $room_accept, 'room_wait' => $room_wait, 'commets' => $comment]);

})->name('Pa');

Route::get('zaivka', function () {
    $session = session::all();
    return view('zaiavka', ['session' => auth::find($session)]);
})->name('zaiavka');

Route::get('edit_profile_arend', function () {
    $session = session::all();
    return view('red_copy', ['session' => auth::find($session)]);
})->name('edit_profile_arend');




//Админ
Route::get('admin_stranizha_arendodatelia', function () {
    return view('admin_stranizha_arendodatelia');
})->name('admin_stranizha_arendodatelia');

Route::get('admin_arendodateli', function () {
    return view('admin_arendodateli', ['waits' => auth::all()->where('role', 1), 'Actings' => auth::all()->where('role', 2)]);
})->name('admin_arendodateli');

Route::get('admin_arenda', function () {
    return view('admin_arenda', ['rooms' => catalog::all()->where('accept', 0)]);
})->name('admin_arend');

Route::get('admin_arenda_broni', function () {
    $brone = brone::all();

    return view('admin_arenda_broni', ['rooms' => catalog::all()->where('accept', 1), 'brone' => $brone]);
})->name('admin_arenda_broni');


//Admin_post
Route::post('view_arend', [\App\Http\Controllers\admin::class, 'view'])->name('view_ared');
Route::post('accept', [\App\Http\Controllers\admin::class, 'accept'])->name('accept');
Route::post('cancel', [\App\Http\Controllers\admin::class, 'cancel'])->name('cancel');
Route::post('admin_brone', [\App\Http\Controllers\admin::class, 'brone_view'])->name('brone_view');
Route::post('brone_accept', [\App\Http\Controllers\admin::class, 'brone_accept'])->name('brone_accept');
Route::post('brone_cancel', [\App\Http\Controllers\admin::class, 'brone_cancel'])->name('brone_cancel');
Route::post('brone_accept_admin',[\App\Http\Controllers\brones::class,'accept'])->name('brone_accept_admin');
Route::post('brone_cancel_admin',[\App\Http\Controllers\brones::class,'cancel'])->name('brone_cancel_admin');
Route::post('arend_cancel_admin',[\App\Http\Controllers\admin::class,'arenda_cancel'])->name('arenda_cancel');

//POST
Route::post('registration', [\App\Http\Controllers\auths::class, 'reg'])->name('registration');
Route::post('login', [\App\Http\Controllers\auths::class, 'login'])->name('login');
Route::post('edit_prof', [\App\Http\Controllers\auths::class, 'edit_user'])->name('edit');
Route::post('wait', [\App\Http\Controllers\auths::class, 'wait'])->name('wait');

//Arenda_post
Route::post('add_arend', [\App\Http\Controllers\catalogs::class, 'add'])->name('add_catalog');
Route::post('edit_prof_aren_edd', [\App\Http\Controllers\auths::class, 'edit_adrend'])->name('edit_arend');
Route::post('del_room',[\App\Http\Controllers\catalogs::class,'del_room'])->name('del_room');

//Бронь
Route::post('room', [\App\Http\Controllers\brones::class, 'view'])->name('brone');
Route::post('brone_room', [\App\Http\Controllers\brones::class, 'brone'])->name('brone_room');
Route::post('cooment', [\App\Http\Controllers\comments::class, 'add'])->name('add_comm');

//Избранное
Route::post('favorites', [\App\Http\Controllers\favorites::class, 'add'])->name('favorites_add');
Route::post('/favorite', [\App\Http\Controllers\favorites::class, 'del'])->name('favorites_del');


Route::get('test',function (){
    $comm=comment::all();
    return view('test',['comm'=>$comm]);
});
