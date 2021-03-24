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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['e'] ='dashboard/e';
$route['e/(:any)']    = 'dashboard/e/$1';
$route['e/(:any)/(:any)']    = 'dashboard/absensi/$1/$2';
//USER 

$route['get_merchandise'] = 'dashboard/get_merchandise';
$route['get_event'] = 'event/get_event';
$route['get_event_terbaru'] = 'event/get_event_terbaru';
$route['detail'] = 'event/index';
$route['pencarian'] = 'event/pencarian';
$route['user/dataakun'] = 'user/dataakun';
$route['events/set_tiket'] = 'event/set_tiket';
// -------------------
$route['events/set_datadiri'] = 'event/set_datadiri';
$route['events/check_email_peserta1'] = 'event/check_email_peserta1';
$route['e/check_email_peserta2'] = 'event/check_email_peserta2';
$route['events/get_dokumentasi'] = 'event/get_dokumentasi';
$route['events/get_data_dokumentasi'] = 'event/get_data_dokumentasi';
$route['events/get_sertifikat'] = 'event/get_sertifikat';
$route['events/konfirmasi_email2'] = 'event/konfirmasi_email2';

$route['e/download_tiket'] = 'event/download_tiket';
$route['events/set_pembayaran1'] = 'event/set_pembayaran1';
$route['events/set_pembayaran2'] = 'event/set_pembayaran2';
$route['events/set_pembayaran3'] = 'event/set_pembayaran3';
$route['e/pembayaran/page/1'] = 'user/datadiri';
$route['e/pembayaran/page/2'] = 'user/pembayaran';
$route['e/pembayaran/page/3'] = 'user/konfirmasi';
$route['user/set_pesan'] = 'user/set_pesan';
//==================================================================
//ADMIN
$route['admin/dashboard'] ='admin/dashboard/index';
$route['admin'] ='admin/dashboard/auth_login';
$route['admin/login'] ='admin/dashboard/auth_login';
$route['admin/logout'] ='admin/dashboard/logout';
$route['admin/grafikDashboard1'] ='admin/dashboard/grafikDashboard1';
$route['admin/grafikDashboard'] ='admin/dashboard/grafikDashboard';

//PAGES ADMIN
//1. events
$route['admin/events'] = 'admin/events/index';
//2. laporan
$route['admin/pesan/send'] ='admin/pesan/set_pesan';