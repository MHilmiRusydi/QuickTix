<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Auth Routes
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';
$route['auth/login'] = 'auth/login';
$route['auth/register'] = 'auth/register';
$route['auth/logout'] = 'auth/logout';

// Event Routes
$route['events'] = 'events/search';
$route['events/search'] = 'events/search';
$route['events/get_detail/(:any)'] = 'events/get_detail/$1';
$route['events/buy'] = 'events/buy';

// Ticket Routes
$route['tickets'] = 'tickets/index';
$route['tickets/validate_qr_page'] = 'tickets/validate_qr_page';

// Profile Routes
$route['profile'] = 'profile/index';
$route['profile/settings'] = 'profile/settings';

// Admin Routes
$route['admin'] = 'admin/index';
$route['admin/events'] = 'admin/events';
$route['admin/add_event'] = 'admin/add_event';
$route['admin/edit_event/(:any)'] = 'admin/edit_event/$1';
$route['admin/delete_event/(:any)'] = 'admin/delete_event/$1';
$route['admin/transactions'] = 'admin/transactions';
$route['admin/update_transaction_status/(:any)'] = 'admin/update_transaction_status/$1';
$route['admin/users'] = 'admin/users';
$route['admin/edit_user/(:any)'] = 'admin/edit_user/$1';
$route['admin/toggle_user_status/(:any)'] = 'admin/toggle_user_status/$1';
$route['admin/delete_user/(:any)'] = 'admin/delete_user/$1';
$route['admin/validate_qr'] = 'admin/validate_qr';
$route['admin/get_images'] = 'admin/get_images';
