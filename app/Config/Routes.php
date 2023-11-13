<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('categories/list', 'CategoriesController::list', ['filter' => 'groupfilter:admin']);

$routes->group('master-file/catalog',function($routes){
    $routes->get('categories','CategoriesController::index',['filter'=>'groupfilter:admin']);
    $routes->get('categories/index','CategoriesController::index',['filter'=>'groupfilter:admin']);
    $routes->get('category-group','CategoryGroupController::index',['filter'=>'groupfilter:admin']);
    $routes->get('office','OfficeController::index',['filter'=>'groupfilter:admin']);
    $routes->get('office-type','OfficeTypeController::index',['filter'=>'groupfilter:admin']);
});

$routes->group('tracking/support',function($routes){
    $routes->get('tickets','SupportController::index',['filter'=>'groupfilter:user']);
    $routes->get('tickets/create','SupportController::generate_form',['filter'=>'groupfilter:user']);
    $routes->post('tickets/create','SupportController::create',['filter'=>'groupfilter:user']);
    $routes->get('tickets/update/(:num)','SupportController::generate_edit_form/$1',['filter'=>'groupfilter:user']);
    $routes->post('tickets/update/(:num)','SupportController::update/$1',['filter'=>'groupfilter:user']);
});

$routes->group('management',function($routes){
    $routes->get('users','UsersController::index',['filter'=>'groupfilter:user']);
    $routes->get('register','UsersController::update',['filter'=>'groupfilter:user']);
    $routes->post('register','UsersController::update',['filter'=>'groupfilter:admin']);
    $routes->get('roles/assign','RolesController::index',['filter'=>'groupfilter:admin']);
    $routes->post('roles/assign','RolesController::index',['filter'=>'groupfilter:admin']);
    $routes->get('roles/save-group/(:num)/(:segment)','SupportController::save_group/$1/$2',['filter'=>'groupfilter:admin']);
    $routes->get('roles/remove-group/(:num)/(:segment)','SupportController::remove_group/$1/$2',['filter'=>'groupfilter:admin']);
});


service('auth')->routes($routes);
