<?php
//$routes = new \Glauce\Router\Router();
//
//$routes->get('/', 'HomeController@index');
//
//$routes->get('/user', 'UserController@index');

use Glauce\Router\Router;

Router::get('/', 'HomeController@index');
Router::get('/about', 'HomeController@about');
Router::get('/works', 'HomeController@works');
Router::get('/contact', 'HomeController@contact');

Router::get('/login', 'AuthController@login');
Router::get('/register', 'AuthController@register');
Router::post('/auth', 'AuthController@loginEnter');
Router::post('/register', 'AuthController@registerEnter');
Router::get('/logout', 'AuthController@logout');

Router::get('/perfil', 'UserController@perfil');

Router::get('/admin', 'Admin\HomeController@index');

Router::get('/admin/user', 'UserController@index', ['AuthMiddleware']);
Router::get('/admin/user/create', 'UserController@create');
Router::post('/admin/user/insert', 'UserController@insert');
Router::get('/admin/user/update/{id}', 'UserController@update');
Router::put('/admin/user/update/{id}', 'UserController@update');
Router::delete('/admin/user/delete/{id}', 'UserController@delete');