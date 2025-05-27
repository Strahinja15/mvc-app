<?php

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/about', 'HomeController@about');
$router->get('/contact', 'HomeController@contact');
$router->get('/register', 'UserController@register_form');
$router->get('/login', 'UserController@login_form');
$router->get('/dashboard', 'AdminController@dashboard');
$router->post('/register_successfull', 'UserController@register');
$router->post('/login_successfull', 'UserController@login');
$router->post('/logout_succesfull', 'UserController@logout');
