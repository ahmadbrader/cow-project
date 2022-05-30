<?php
Route::get('/', function() {
    return redirect(route('admin.dashboard'));
});

Route::get('home', function() {
    return redirect(route('admin.dashboard'));
});

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function() {
    Route::get('dashboard', 'DashboardController')->name('dashboard');
    Route::get('product', 'ProductController@index')->name('product');
    Route::post('product', 'ProductController@index')->name('product');
    Route::get('product/add', 'ProductController@add')->name('product.add');
    Route::post('product/add/save', 'ProductController@save')->name('product.save');

    Route::get('users/roles', 'UserController@roles')->name('users.roles');
    Route::resource('users', 'UserController', [
        'names' => [
            'index' => 'users'
        ]
    ]);

    // Permission
    Route::get('permission', 'PermissionController@index')->name('permission.index');
    Route::get('permission/add', 'PermissionController@add')->name('permission.add');
    Route::post('permission/save', 'PermissionController@save')->name('permission.save');
    Route::get('permission/{id}', 'PermissionController@edit')->name('permission.edit');
    Route::post('permission/{id}', 'PermissionController@edit')->name('permission.edit');
});

Route::middleware('auth')->get('logout', function() {
    Auth::logout();
    return redirect(route('login'))->withInfo('You have successfully logged out!');
})->name('logout');

Auth::routes(['verify' => true]);

Route::name('js.')->group(function() {
    Route::get('dynamic.js', 'JsController@dynamic')->name('dynamic');
});

// Get authenticated user
Route::get('users/auth', function() {
    return response()->json(['user' => Auth::check() ? Auth::user() : false]);
});
