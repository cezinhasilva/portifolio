<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('api/contact', 'Contact::send');


// Rotas do Dashboard protegidas pelo Shield
$routes->group('dashboard', ['filter' => 'group:user'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('create', 'Dashboard::create');
    $routes->post('store', 'Dashboard::store');
});

service('auth')->routes($routes);
