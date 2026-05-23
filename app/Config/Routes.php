<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- Halaman Utama & Fitur Utama ---
$routes->get('/', 'Home::index');            // Mode: Home
$routes->get('packages', 'Home::packages');   // Mode: Packages (List & Filter)
$routes->get('about', 'Home::about');         // Mode: About Us
$routes->get('contact', 'Home::contact');     // Mode: Contact Us

// --- Link Baru dari Kartu Fitur (Home) ---
$routes->get('travel/resmi', 'Home::packages');    // Mengarah ke list paket resmi
$routes->get('bandingkan/paket', 'Home::packages'); // Mengarah ke list perbandingan

// --- Detail Paket ---
$routes->get('packages/detail/(:num)', 'Home::detail/$1'); 

// --- Halaman Lainnya ---
$routes->get('umrah', 'Home::index');

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