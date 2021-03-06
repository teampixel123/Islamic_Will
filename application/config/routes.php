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
$route['default_controller'] = 'Website';
$route['About-Us'] = 'Website/about';
$route['Benefits'] = 'Website/benefit';
$route['Pricing'] = 'Website/pricing';
$route["FAQ"] = 'Website/faqs';
$route['Contact'] = 'Website/contact';
$route["Terms-and-Conditions"] = 'Website/terms';
$route['Privacy-Policy'] = 'Website/privacy';
$route['Login'] = 'User_controller/login';
$route['Register'] = 'Login_controller/register_user_view';
$route['User-Dashboard'] = 'User_controller/user_dashboard';
$route['Will-Success'] = 'User_controller/success_page';

$route['Start-Will'] = 'Will_controller/load_login_start_info';

// Owner
$route['Owner-Login'] = 'Owner_controller/login_view';
$route['Owner-Dashboard'] = 'Owner_controller/dashboard';
$route['Owner-Will-List'] = 'Owner_controller/will_list';
$route['Users-List'] = 'Owner_controller/users_list';
$route['Payments-List'] = 'Owner_controller/payments_list';
$route['Will-PDF'] = 'Pdf_controller/final_pdf_owner';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
