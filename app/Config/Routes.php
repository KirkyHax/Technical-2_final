<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('customer-accounts', 'CustomerAccounts::index', ['as' => 'customer-accounts']);
$routes->get('user-accounts', 'UserAccounts::index', ['as' => 'user-accounts']);

// Short aliases are convenient during development and demonstrations.
$routes->get('customers', 'CustomerAccounts::index');
$routes->get('users', 'UserAccounts::index');
