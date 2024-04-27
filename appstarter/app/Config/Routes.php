<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 // Routes Administrateur
$routes->get('/login', 'Connection::index'); // Page de Login
$routes->post('/login', 'Connection::attemptLogin'); // Post pour tentative de connexion
$routes->get('/home', 'HomeController::home'); // Home aprés Login
$routes->get('/NonAuthorized', 'AuthorizationController::index');
$routes->get('/gestion_abonnes', 'AbonneController::list', ['filter' =>  \App\Filters\AdminFilter::class]); // Pas de Gestion des abonnés Admin
$routes->get('/abonne/detail/(:any)', 'AbonneController::detail/$1', ['filter' =>  \App\Filters\AdminFilter::class]); // Get pour récupérer la page d'info d'un abonné
$routes->post('/abonne/update/(:num)', 'AbonneController::update/$1', ['filter' =>  \App\Filters\AdminFilter::class]); // Post pour mettre a jour les infos des abonnés
$routes->post('/abonne/add', 'AbonneController::add', ['filter' =>  \App\Filters\AdminFilter::class]); // Post pour update la DBB et ajouter un abonné
$routes->get('/gestion_livres','LivresController::index', ['filter' =>  \App\Filters\AdminFilter::class]); // Get pour avoir la page de gestion des livres
$routes->post('/livres/add', 'LivresController::add', ['filter' =>  \App\Filters\AdminFilter::class]); // Post pour ajouter un livre
$routes->get('/gestion_exemplaires','ExemplaireController::index', ['filter' =>  \App\Filters\AdminFilter::class]); // Get pour avoir la page de gestion des exemplaires
$routes->post('/exemplaires/add', 'ExemplaireController::add', ['filter' =>  \App\Filters\AdminFilter::class]); // Post pour ajouter un exemplaire
$routes->get('/gestion_etat_exemplaires', 'ExemplaireController::gestionEtatExemplaires', ['filter' =>  \App\Filters\AdminFilter::class]); // Get pour aller sur la page de détails des états des exemplaires
$routes->post('/abonne/delete/(:any)', 'AbonneController::delete/$1',['filter' =>  \App\Filters\AdminFilter::class]); // Post pour supprimer un abonne
$routes->get('/gestion_emprunts', 'EmpruntsController::list',['filter' =>  \App\Filters\AdminFilter::class]); // Get pour avoir la page des emprunts
$routes->post('/emprunts/update/(:num)', 'EmpruntsController::update/$1', ['filter' =>  \App\Filters\AdminFilter::class]); // Post pour mettre a jour les emprunt
$routes->post('/emprunts/add', 'EmpruntsController::add', ['filter' =>  \App\Filters\AdminFilter::class]); // Post pour update la DBB et ajouter un emprunt
$routes->post('/emprunts/delete/(:any)', 'EmpruntsController::deleteEmprunts/$1', ['filter' =>  \App\Filters\AdminFilter::class]); // Post pour update la DBB et supprimer une demande
$routes->get('/emprunts/suggestions', 'AutoCompleteController::autocompleteAbo'); // Autocompletion Abo
$routes->get('/exemplaires/suggestions', 'AutoCompleteController::autocompleteLivres'); // Autocompletion Livres
$routes->get('/gestion_demandes', 'DemandesController::list', ['filter' =>  \App\Filters\AdminFilter::class]); // Get pour avoir la page de gestion des demandes
$routes->post('/demandes/delete/(:any)', 'DemandesController::delete/$1', ['filter' =>  \App\Filters\AdminFilter::class]); // Post pour update la DBB et supprimer une demande

 // Routes Abonné

 $routes->get('/liste_livres', 'LivresController::index', ['filter' =>  \App\Filters\SubscriberFilter::class]); // Pas de Gestion des abonnés Admin
