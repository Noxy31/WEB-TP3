<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Connection::index');
$routes->post('/login', 'Connection::attemptLogin');
$routes->get('/home', 'AdminController::index');
$routes->get('/gestion_abonnés', 'AbonneController::index');
$routes->get('/abonne/detail/(:any)', 'AbonneController::detail/$1');
$routes->post('/abonne/update/(:num)', 'AbonneController::update/$1');