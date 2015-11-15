<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Frontoffice Routes
 */
Route::get('/',array('as'=>'dashboard',function()
{
    return View::make('welcome');
}));



/**
 * Backoffice Routes
 */
Route::group(['namespace' => 'App\Http\Controllers','middleware'=>'sentry.auth'],function() {
    Route::get('/admin',array('as'=>'home',function()
    {
        return View::make('admin.index');
    }));
});

Route::group(['namespace' => 'Sentinel\Controllers'], function () {

    // Sentinel Session Routes
    Route::get('admin/login', ['as' => 'sentinel.login', 'uses' => 'SessionController@create']);
    Route::get('admin/logout', ['as' => 'sentinel.logout', 'uses' => 'SessionController@destroy']);
    Route::get('admin/sessions/create', ['as' => 'sentinel.session.create', 'uses' => 'SessionController@create']);
    Route::post('admin/sessions/store', ['as' => 'sentinel.session.store', 'uses' => 'SessionController@store']);
    Route::delete('admin/sessions/destroy', ['as' => 'sentinel.session.destroy', 'uses' => 'SessionController@destroy']);

    // Sentinel Registration
    Route::get('admin/register', ['as' => 'sentinel.register.form', 'uses' => 'RegistrationController@registration']);
    Route::post('admin/register', ['as' => 'sentinel.register.user', 'uses' => 'RegistrationController@register']);
    Route::get('admin/users/activate/{hash}/{code}', ['as' => 'sentinel.activate', 'uses' => 'RegistrationController@activate']);
    Route::get('admin/reactivate', ['as' => 'sentinel.reactivate.form', 'uses' => 'RegistrationController@resendActivationForm']);
    Route::post('admin/reactivate', ['as' => 'sentinel.reactivate.send', 'uses' => 'RegistrationController@resendActivation']);
    Route::get('admin/forgot', ['as' => 'sentinel.forgot.form', 'uses' => 'RegistrationController@forgotPasswordForm']);
    Route::post('admin/forgot', ['as' => 'sentinel.reset.request', 'uses' => 'RegistrationController@sendResetPasswordEmail']);
    Route::get('admin/reset/{hash}/{code}', ['as' => 'sentinel.reset.form', 'uses' => 'RegistrationController@passwordResetForm']);
    Route::post('admin/reset/{hash}/{code}', ['as' => 'sentinel.reset.password', 'uses' => 'RegistrationController@resetPassword']);

    // Sentinel Profile
    Route::get('admin/profile', ['as' => 'sentinel.profile.show', 'uses' => 'ProfileController@show']);
    Route::get('admin/profile/edit', ['as' => 'sentinel.profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('admin/profile', ['as' => 'sentinel.profile.update', 'uses' => 'ProfileController@update']);
    Route::post('admin/profile/password', ['as' => 'sentinel.profile.password', 'uses' => 'ProfileController@changePassword']);

    // Sentinel Users
    Route::get('admin/users', ['as' => 'sentinel.users.index', 'uses' => 'UserController@index']);
    Route::get('admin/users/create', ['as' => 'sentinel.users.create', 'uses' => 'UserController@create']);
    Route::post('admin/users', ['as' => 'sentinel.users.store', 'uses' => 'UserController@store']);
    Route::get('admin/users/{hash}', ['as' => 'sentinel.users.show', 'uses' => 'UserController@show']);
    Route::get('admin/users/{hash}/edit', ['as' => 'sentinel.users.edit', 'uses' => 'UserController@edit']);
    Route::post('admin/users/{hash}/password', ['as' => 'sentinel.password.change', 'uses' => 'UserController@changePassword']);
    Route::post('admin/users/{hash}/memberships', ['as' => 'sentinel.users.memberships', 'uses' => 'UserController@updateGroupMemberships']);
    Route::put('admin/users/{hash}', ['as' => 'sentinel.users.update', 'uses' => 'UserController@update']);
    Route::delete('admin/users/{hash}', ['as' => 'sentinel.users.destroy', 'uses' => 'UserController@destroy']);
    Route::get('admin/users/{hash}/suspend', ['as' => 'sentinel.users.suspend', 'uses' => 'UserController@suspend']);
    Route::get('admin/users/{hash}/unsuspend', ['as' => 'sentinel.users.unsuspend', 'uses' => 'UserController@unsuspend']);
    Route::get('admin/users/{hash}/ban', ['as' => 'sentinel.users.ban', 'uses' => 'UserController@ban']);
    Route::get('admin/users/{hash}/unban', ['as' => 'sentinel.users.unban', 'uses' => 'UserController@unban']);

    // Sentinel Groups
    Route::get('admin/groups', ['as' => 'sentinel.groups.index', 'uses' => 'GroupController@index']);
    Route::get('admin/groups/create', ['as' => 'sentinel.groups.create', 'uses' => 'GroupController@create']);
    Route::post('admin/groups', ['as' => 'sentinel.groups.store', 'uses' => 'GroupController@store']);
    Route::get('admin/groups/{hash}', ['as' => 'sentinel.groups.show', 'uses' => 'GroupController@show']);
    Route::get('admin/groups/{hash}/edit', ['as' => 'sentinel.groups.edit', 'uses' => 'GroupController@edit']);
    Route::put('admin/groups/{hash}', ['as' => 'sentinel.groups.update', 'uses' => 'GroupController@update']);
    Route::delete('admin/groups/{hash}', ['as' => 'sentinel.groups.destroy', 'uses' => 'GroupController@destroy']);

});
