<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/key', 'ExampleController@generateKey');
$router->post('/foo', 'ExampleController@fooExample');
$router->get('/user/{id}', 'ExampleController@getUser');
$router->get('/post/{postId}/comments/{commentId}', function ($postId, $commentId) {
    return 'Post ID = ' . $postId . ' Comment ID = ' . $commentId;
});
$router->get('/opsional[/{param}]', function ($param = null) {
    return $param;
});
// Route Alias
$router->get('profile', function () {
    return redirect()->route('route.profile');
});
$router->get('profile/abikun', ['as' => 'route.profile', function () {
    return 'Abikun';
}]);
//Route Group dengan middleware umur pengguna
$router->group(['prefix' => 'admin', 'middleware' => 'age'], function () use ($router) {
    $router->get('/home', function () {
        return 'Halaman Admin';
    });
    $router->get('/profile', function () {
        return 'Halaman Profile';
    });
});
//Route jika gagal dalam kondisi middleware
$router->get('/failed', function () {
    return 'Not Mature';
});

//Route CRUD start here
$router->post('/book', 'BookController@create');
$router->get('/book', 'BookController@index');
$router->get('/book/{id}', 'BookController@show');
$router->put('/book/{id}', 'BookController@update');
$router->delete('/book/{id}', 'BookController@destroy');
