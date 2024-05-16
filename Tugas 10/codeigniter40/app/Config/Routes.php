<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/books/create', 'Books::create');
$routes->delete('/books/(:num)', 'Books::delete/$1');
$routes->get('/books/(:any)', 'Books::detail/$1');
$routes->setAutoRoute(true);
