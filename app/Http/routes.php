<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Role;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    $user = User::find(1);
    $user->roles()->save(new Role(['name'=>'admin']));
});

Route::get('/read', function () {
    $user = User::find(1);

    foreach ($user->roles as $role){
        //dd($role);

        echo $role->name;
    }
});

Route::get('/update', function () {
    $user = User::findOrFail(1);

        foreach ($user->roles as $role){
            if($role->name =='admin'){
                $role->name="user";
                $role->save();
            }
        }
});

Route::get('/delete', function () {
    $user = User::findOrFail(1);

foreach($user->roles as $role){
    $role->whereId(1)->delete();
}
});

Route::get('/attach', function () {
    $user = User::findOrFail(1);

    $user->roles()->attach(1);
});

Route::get('/detach', function () {
    $user = User::findOrFail(1);

  //  $user->roles()->detach(1);
  //  $user->roles()->detach();
});

Route::get('/sync', function () {
    $user = User::findOrFail(1);

    $user->roles()->sync([1,3,2]);

});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
