<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- Halaman Utama & Fitur Utama ---
$routes->get('/', 'Home::index');           // Mode: Home
$routes->get('packages', 'Home::packages');  // Mode: Packages (List & Filter)
$routes->get('about', 'Home::about');        // Mode: About Us
$routes->get('contact', 'Home::contact');    // Mode: Contact Us (WAJIB ADA BIAR BISA DIPENCET)

// --- Detail Paket ---
$routes->get('packages/detail/(:num)', 'Home::detail/$1'); // Biar tombol Detail jalan

// --- Halaman Lainnya ---
$routes->get('umrah', 'UmrahController::index');

// --- Fitur AI ---
$routes->get('ai', 'Ai::index');
$routes->post('ai/proses', 'Ai::proses');

// --- Autentikasi (Login/Register/Logout) ---
$routes->group('auth', function($routes) {
    $routes->get('/', 'Auth::index');
    $routes->post('register', 'Auth::register');
    $routes->post('login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
});

// --- Profil & User Management ---
$routes->get('profile', 'Auth::profile'); 
$routes->group('user', function($routes) {
    $routes->get('profile', 'User::index');
    $routes->post('update_profile', 'User::update');
});