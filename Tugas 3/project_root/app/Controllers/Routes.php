<?php

use CodeIgniter\Router\RouterCollection;

/**
 *  @var RouterCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'page::about');
$routes->get('/contact', 'page::contact');
$routes->get('/faqs', 'page::faqs');
$routes->getAutoRoute(true);
$routes->get('/biodata', 'page::biodata');