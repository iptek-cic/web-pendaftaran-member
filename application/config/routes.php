<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'authentication';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['register'] = 'authentication/register';
$route['login'] = 'authentication/index';
$route['logout'] = 'authentication/logout';

$route['data-member'] = "members/index";
$route['data-member/create'] = "members/create";
$route['data-member/(:any)'] = "members/detail/$1";
$route['data-member/edit/(:any)'] = "members/edit/$1";
$route['data-member/update/(:any)'] = "members/update/$1";
$route['data-member/delete/(:any)'] = "members/delete/$1";
$route['data-member/export/pdf'] = "export/memberPDF";
$route['data-member/export/excel'] = "export/memberExcel";

$route['data-prodi'] = "prodi/index";
$route['data-prodi/create'] = "prodi/create";
$route['data-prodi/(:any)'] = "prodi/detail/$1";
$route['data-prodi/edit/(:any)'] = "prodi/edit/$1";
$route['data-prodi/update/(:any)'] = "prodi/update/$1";
$route['data-prodi/delete/(:any)'] = "prodi/delete/$1";

$route['manajemen-pengguna'] = "user/index";
$route['manajemen-pengguna/create'] = "user/create";
$route['manajemen-pengguna/(:any)'] = "user/detail/$1";
$route['manajemen-pengguna/edit/(:any)'] = "user/edit/$1";
$route['manajemen-pengguna/update/(:any)'] = "user/update/$1";
$route['manajemen-pengguna/delete/(:any)'] = "user/delete/$1";
$route['manajemen-pengguna/profile'] = "user/profile";