<?php

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

$router->get('/key', function(){
	return \Illuminate\Support\Str::random(32);
});

$router->group(['prefix' => 'api/'], function ($router) {
	$router->post('/login', 'LoginController@index');
	$router->post('/register', 'UserController@register');
	// $router->get('/user/{id}','UserController@get_user');
	$router->get('/user/{id}', ['middleware' => 'auth', 'uses' => 'UserController@get_user']);
	$router->post('/user/{id}', ['middleware' => 'auth', 'uses' => 'UserController@get_user']);

// $router->get('/todo', 'todoController@index');
// $router->get('/todo/{id}', 'todoController@show');
// $router->post('/todo', 'todoController@store');

	$router->get('/portal', 'PortalController@index');
	$router->get('/portal/{id}', 'PortalController@show');
	$router->post('/portal', 'PortalController@store');
	$router->post('/portal/{id}/update','PortalController@update');
	$router->get('/portal/{id}/delete','PortalController@delete');

	$router->get('/keyword', 'KeywordController@index');
	$router->get('/keyword/{id}', 'KeywordController@show');
	$router->post('/keyword', 'KeywordController@store');
	$router->post('/keyword/{id}/update','KeywordController@update');
	$router->get('/keyword/{id}/delete','KeywordController@delete');

	$router->get('/news', 'NewsController@index');
	$router->get('/news/getTotalNewsBySite', 'NewsController@getTotalNewsBySite');
	$router->get('/news/getTotalNewsByKeyword', 'NewsController@getTotalNewsByKeyword');
	$router->get('/news/getKontenByDate', 'NewsController@getKontenByDate');
	$router->get('/news/{id}', 'NewsController@show');
	$router->post('/news', 'NewsController@store');

	$router->get('/wordcount', 'WordcloudController@index');
	$router->get('/wordcount/{id}', 'WordcloudController@show');
	$router->post('/wordcount', 'WordcloudController@store');
	$router->post('/wordcount/{id}/update','WordcloudController@update');
	$router->get('/wordcount/{id}/delete','WordcloudController@delete');

	$router->get('/sentiment', 'SentimentController@index');
	$router->get('/sentiment/{id}', 'SentimentController@show');
	$router->post('/sentiment', 'SentimentController@store');
	$router->post('/sentiment/{id}/update','SentimentController@update');
	$router->get('/sentiment/{id}/delete','SentimentController@delete');

});