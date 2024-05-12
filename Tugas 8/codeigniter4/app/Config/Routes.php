<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
//$routes->get('/buku/(:segment)', 'Buku::detail/$1');
$routes->setAutoRoute(true);
