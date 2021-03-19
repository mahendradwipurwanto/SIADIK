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

// Custom Route

$route['Pengaturan/Kategori-Surat']         = 'Pengaturan/Kategori';

$route['Penduduk/Tambah-Penduduk']          = 'Penduduk/tambah_penduduk';
$route['Penduduk/Ubah-Penduduk/(:num)']     = 'Penduduk/edit_penduduk/$1';
$route['Penduduk/Detail-Penduduk/(:num)']   = 'Penduduk/detail_penduduk/$1';

$route['Surat-Masuk']                       = 'Suratmasuk';
$route['Surat-Masuk/Tambah-Surat-Masuk']    = 'Suratmasuk/tambah_surat';
$route['Surat-Masuk/Ubah-Surat/(:num)']     = 'Suratmasuk/edit_surat/$1';

$route['Surat-Keluar']                              = 'Suratkeluar';
$route['Surat-Keluar/Tambah-Surat-Keluar']          = 'Suratkeluar/tambah_1';
$route['Surat-Keluar/Tambah-Surat-Keluar/Isi-Data/(:any)'] = 'Suratkeluar/tambah_2/$1';
$route['Surat-Keluar/Ubah-Surat/(:num)/(:num)']            = 'Suratkeluar/edit_surat/$1/$2';
$route['Surat-Keluar/Detail-Surat/(:num)/(:num)']          = 'Suratkeluar/detail_surat/$1/$2';
$route['Surat-Keluar/Cetak-Surat/(:num)/(:num)']           = 'Cetak/cetak_surat/$1/$2';

$route['Surat-Keluar']  = 'Suratkeluar';
$route['Buat-Surat']    = 'Suratkeluar/buatsurat';

$route['Browser']   = 'Dashboard/Browser';
$route['Changelog'] = 'Dashboard/changelog';

$route['lupa-pin']  = 'Login/lupapin';
$route['logout']    = 'Login/logout';


// Base Route

$route['default_controller']  = 'Login';
$route['404_override']        = 'Auto/error404';
$route['translate_uri_dashes'] = FALSE;
