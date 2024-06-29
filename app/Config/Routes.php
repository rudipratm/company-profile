<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin\DashboardController::index');
$routes->get('dashboard', 'Admin\DashboardController::index');

$routes->get('produk', 'Admin\ProdukController::index');
$routes->get('produk/tambah', 'Admin\ProdukController::create');
$routes->post('produk/simpan', 'Admin\ProdukController::storeProduk');
$routes->post('produk/ubah/(:num)', 'Admin\ProdukController::updateProduk/$1');
$routes->delete('produk/hapus/(:num)', 'Admin\ProdukController::deleteProduk/$1');

$routes->get('kategori', 'Admin\ProdukController::kategori');
$routes->post('kategori/tambah', 'Admin\ProdukController::store');
$routes->post('kategori/ubah/(:num)', 'Admin\ProdukController::update/$1');
$routes->delete('kategori/hapus/(:num)', 'Admin\ProdukController::delete/$1');
