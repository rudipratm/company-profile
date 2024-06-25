<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin\DashboardController::index');
$routes->get('dashboard', 'Admin\DashboardController::index');
$routes->get('produk', 'Admin\ProdukController::index');
$routes->get('kategori', 'Admin\ProdukController::kategori');

$routes->post('kategori/tambah', 'Admin\ProdukController::store');
$routes->post('kategori/ubah/(:num)', 'Admin\ProdukController::update/$1');
$routes->delete('kategori/hapus/(:num)', 'Admin\ProdukController::delete/$1');
