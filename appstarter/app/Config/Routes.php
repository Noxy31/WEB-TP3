<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Connection::index'); // Page de Login
$routes->post('/login', 'Connection::attemptLogin'); // Post pour tentative de connexion
$routes->get('/home', 'AdminController::index', ['filter' =>  \App\Filters\AuthenticatedFilter::class]); // Admin Home aprés Login
$routes->get('/gestion_abonnés', 'AbonneController::index', ['filter' =>  \App\Filters\AuthenticatedFilter::class]); // Pas de Gestion des abonnés Admin
$routes->get('/abonne/detail/(:any)', 'AbonneController::detail/$1', ['filter' =>  \App\Filters\AuthenticatedFilter::class]); // Get pour récupérer la page d'info d'un abonné
$routes->post('/abonne/update/(:num)', 'AbonneController::update/$1', ['filter' =>  \App\Filters\AuthenticatedFilter::class]); // Post pour mettre a jour les infos des abonnés
$routes->post('/abonne/add', 'AbonneController::add', ['filter' =>  \App\Filters\AuthenticatedFilter::class]); // Post pour update la DBB et ajouter un abonné
$routes->get('/gestion_livres','LivresController::index', ['filter' =>  \App\Filters\AuthenticatedFilter::class]); // Get pour avoir la page de gestion des livres
$routes->post('/livres/add', 'LivresController::add', ['filter' =>  \App\Filters\AuthenticatedFilter::class]); // Post pour ajouter un livre