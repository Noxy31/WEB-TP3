<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Connection::index');
$routes->post('/login', 'Connection::attemptLogin');
$routes->get('/admin_home', 'AdminController::index');