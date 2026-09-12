<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/** @var object $router **/

// =========================
// LOGIN
// =========================

$router->get('/', 'AuthController::login');

$router->get('/login', 'AuthController::login');

$router->post('/login/authenticate', 'AuthController::authenticate');


// =========================
// REGISTER
// =========================

$router->get('/register', 'AuthController::register');

$router->post('/register/store', 'AuthController::storeUser');


// =========================
// PROTECTED PRODUCT ROUTES
// =========================

// READ
$router->get('/products', 'ProductController::index')
    ->middleware('auth');

// CREATE
$router->get('/products/create', 'ProductController::create')
    ->middleware('auth');

$router->post('/products/store', 'ProductController::store')
    ->middleware('auth');

// EDIT
$router->get('/products/edit/{id}', 'ProductController::edit')
    ->middleware('auth');

$router->post('/products/update/{id}', 'ProductController::update')
    ->middleware('auth');

// DELETE
$router->get('/products/delete/{id}', 'ProductController::delete')
    ->middleware('auth');


// =========================
// LOGOUT
// =========================

$router->get('/logout', 'AuthController::logout');