<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'EventController::index');
$routes->get('events', 'EventController::index');
$routes->get('events/create', 'EventController::create');
$routes->get('events/delete/(:num)', 'EventController::delete/$1');
$routes->get('events/show/(:num)', 'EventController::show/$1');
$routes->post('events/store', 'EventController::store');
$routes->post('events/register/(:num)', 'EventController::registerParticipant/$1');
$routes->post('events/registerParticipant/(:num)', 'EventController::registerParticipant/$1');
$routes->post('events/update/(:num)', 'EventController::update/$1');
$routes->get('events/edit/(:num)', 'EventController::edit/$1');

$routes->get('/registrations/index/(:num)', 'RegistrationController::index/$1');
$routes->post('/registrations/store', 'RegistrationController::store');

$routes->get('participants/edit/(:num)', 'EventController::editParticipant/$1');
$routes->post('participants/update/(:num)', 'EventController::updateParticipant/$1');
$routes->get('participants/delete/(:num)', 'EventController::deleteParticipant/$1');
$routes->get('participants', 'ParticipantController::index');
