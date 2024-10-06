<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['Ridership.aspx']			= 'Decision_support_rpt/Ridership';
$route['Ridership.JSframework']			= 'Decision_support_rpt/Ridership';
$route['addRidership.JS']			= 'Decision/addRidership';


//$route['default_controller'] = 'Mainpage';
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
