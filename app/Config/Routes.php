<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- Halaman Utama & Fitur Utama ---
$routes->get('/', 'Home::index');
$routes->get('packages', 'Home::packages');
$routes->get('about', 'Home::about');
$routes->get('contact', 'Home::contact');

// --- Halaman Mandiri ---
$routes->get('travel_resmi', 'Home::travel_resmi'); 
$routes->get('perbandingan', 'Home::perbandingan');

// --- Detail Paket ---
$routes->get('packages/detail/(:num)', 'Home::detail/$1'); 

// --- Fitur AI ---
$routes->get('ai', 'Ai::index');
$routes->post('ai/proses', 'Ai::proses');

// --- Autentikasi ---
$routes->group('auth', function($routes) {
    $routes->get('/', 'Auth::index');
    $routes->post('register', 'Auth::register');
    $routes->post('login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
});

// --- Profil & User Management ---
// Mengarahkan user/update_profile ke UserController::update
$routes->group('user', function($routes) {
    $routes->get('profile', 'User::index');
    $routes->post('update_profile', 'User::update'); 
});