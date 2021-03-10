<?php
//$routes = new \Glauce\Router\Router();
//
//$routes->get('/', 'HomeController@index');
//
//$routes->get('/user', 'UserController@index');

use Glauce\Router\Router;

Router::get('/', 'HomeController@index');
Router::get('/user', 'UserController@index');
Router::get('/user/create', 'UserController@create');
Router::post('/user/create', 'UserController@create');
Router::get('/user/update/{id}', 'UserController@update');
Router::put('/user/update/{id}', 'UserController@update');
Router::delete('/user/delete/{id}', 'UserController@delete');