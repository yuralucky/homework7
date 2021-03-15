<?php

use Illuminate\Events\Dispatcher;

$request = \Illuminate\Http\Request::createFromGlobals();

function request()
{
    global $request;
    return $request;
}

$dispatcher=new Dispatcher();
$container=new \Illuminate\Container\Container();
$router=new \Illuminate\Routing\Router($dispatcher,$container);

function router(){
    global $router;

    return $router;
}

$router->get('/','\App\Controller\HomeController@index');

$router->get('/category','\App\Controller\CategoryController@index');
$router->get('/category/create','\App\Controller\CategoryController@create');
$router->post('/category/create','\App\Controller\CategoryController@store');
$router->get('/category/{id}/edit','\App\Controller\CategoryController@edit');
$router->post('/category/{id}/update','\App\Controller\CategoryController@update');
$router->get('/category/{id}/destroy','\App\Controller\CategoryController@destroy');

$router->get('/tag','\App\Controller\TagController@index');
$router->get('/tag/create','\App\Controller\TagController@create');
$router->post('/tag/create','\App\Controller\TagController@store');
$router->get('/tag/{id}/edit','\App\Controller\TagController@edit');
$router->post('/tag/{id}/update','\App\Controller\TagController@update');
$router->get('/tag/{id}/destroy','\App\Controller\TagController@destroy');

$router->get('/post','\App\Controller\PostController@index');
$router->get('/post/create','\App\Controller\PostController@create');
$router->post('/post/create','\App\Controller\PostController@store');
$router->get('/post/{id}/edit','\App\Controller\PostController@edit');
$router->post('/post/{id}/update','\App\Controller\PostController@update');
$router->get('/post/{id}/destroy','\App\Controller\PostController@destroy');