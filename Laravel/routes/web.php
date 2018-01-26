<?php

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

use App\Flight;

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/locationRedirect', function () {
	//
})->middleware('locationRedirect');

Route::get('role',[
	'middleware' => 'Role:editor',
	'uses' => 'TestController@index',
]);

////////////////////////////////////////////////////
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

/* Route::get('/', function () {
	$tasks = DB::table('tasks')->get();
	return view('welcome', compact('tasks'));
}); */

Route::get('/flights', function () {
	$flights = Flight::where('name', 'Flight1')->get();

	/* $flights = Flight::all();
	return view('flights.index', compact('flights')); */
});

Route::match(['get', 'post', 'put'], '/testing', function () {
    echo  'Ruta testing para los verbos GET, POST, PUT';
});

/* Route::get('colaboradores/{nombre}', function($nombre){
	return "Mostrando el colaborador $nombre";
}); */

Route::get('tienda/productos/{id}', function($id_producto){
	return "Mostrando el producto $id_producto de la tienda";
});

Route::get('categoria/{categoria}', function($categoria){
	return "Ruta 1- Viendo categoría $categoria y no recibo página";
});

Route::get('categoria/{categoria}/{pagina?}', function($categoria, $pagina=1){
	return "Ruta 2 - Viendo categoría $categoria y página $pagina";
});

Route::get('colaboradores/{nombre}', function($nombre){
	return "Mostrando el colaborador $nombre";
})->where(array('nombre' => '[a-zA-Z]+'));

Route::get('tienda/productos/{id}', function($id_producto){
	return "Mostrando el producto $id_producto de la tienda";
})->where(['id' => '[0-9]+']);

Route::get('user/{id}/{name}', function ($id, $name) {
    //
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

////////////////////////////////////////////////////////
/* Route::get('/tasks', function () {
	$tasks = Task::all();
	return view('tasks.index', compact('tasks'));
});

Route::get('/tasks/{task}', function ($id) {
	$tasks = Task::find($id);
	return view('tasks.show', compact('tasks'));
}); */
///////////////////////////////////////////////////////
//Testing