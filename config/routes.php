<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']    = 'homepage';
$route['event']                 = 'guest/index/event';
$route['katalog']               = 'guest/index/katalog';
$route['lp/(:any)/(:any)']      = 'guest/index/lp/$1/$2';

$route['login']                 = 'auth/log/in';
$route['do_login']              = 'auth/log/do_login';
$route['logout']                = 'auth/log/out';

$route['admin']                 = 'admin/dashboard';
$route['admin/member/(:any)']   = 'admin/member/list/$1';

$route['member']                = 'member/dashboard';

$route['pembelian']             = 'p/b/0/1';
$route['daftar']                = 'p/b/0/1';

$route['register']              = 'auth/register';
$route['reg/(:num)']            = 'auth/reg/$1';

$route['beli/(:num)']           = 'transaction/purchase/$1';
$route['affiliate']             = 'reg/affiliate/0';

$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
