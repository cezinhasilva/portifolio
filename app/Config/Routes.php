<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rotas do Ecossistema de Achadinhos da Shopee
$routes->get('achadinhos', 'Achadinhos::index');
$routes->get('achadinhos/go/(:num)', 'Achadinhos::go/$1');
$routes->post('api/achadinhos/salvar', 'Achadinhos::apiSalvar');

// Rotas do Dashboard protegidas pelo Shield
$routes->group('dashboard', ['filter' => 'group:user'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('create', 'Dashboard::create');
    $routes->post('store', 'Dashboard::store');
});

service('auth')->routes($routes);
