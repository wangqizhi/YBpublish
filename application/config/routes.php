<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

// online
$route['default_controller'] = "ybindex";
$route['force_index'] = "ybindex/force_index";
$route['ybindex/choose_index'] = "ybindex/choose_index";
$route['checklogin'] = "checkLogin";
$route['checkLogin/(:any)'] = 'checkLogin/$1';
$route['ybindex/(:any)'] = "ybindex/$1";

// publish_system
$route['ybpublish'] = "ybpublish/publish_index";
$route['ybpublish/mkflow'] = "ybpublish/publish_index/mkflow";
$route['ybpublish/mktep'] = "ybpublish/publish_index/mktep";
$route['ybpublish/analyse'] = "ybpublish/publish_index/analyse";
$route['ybpublish/insert_mkflow'] = "ybpublish/publish_index/insert_mkflow";
$route['ybpublish/check_files'] = "ybpublish/publish_index/check_files";
$route['ybpublish/publish_flow_resolve'] = "ybpublish/publish_flow_resolve";
$route['ybpublish/publish_flow_resolve/test'] = "ybpublish/publish_flow_resolve/test";
$route['ybpublish/admin'] = "ybpublish/publish_admin/ybpublish_admin";
$route['ybpublish/admin/(:any)'] = "ybpublish/publish_admin/$1";
$route['ybpublish/(:any)'] = "ybpublish/publish_index/$1";

// case_system
$route['ybcase'] = "ybcase/case_index";
$route['ybcase/admin'] = "ybcase/case_admin";
$route['ybcase/(:any)'] = "ybcase/case_index/$1";


//admin
$route['admin'] = "ybadmin/admin_index";
$route['admin/ftp_manage'] = "ybadmin/admin_index/ftp_manage";
$route['admin/account_setting'] = "ybadmin/admin_index/account_setting";
$route['admin/(:any)'] = "ybadmin/admin_index/$1";
$route['admin_user/(:any)'] = "ybadmin/admin_user/$1";
$route['admin_group/(:any)'] = "ybadmin/admin_group/$1";
$route['admin_power/(:any)'] = "ybadmin/admin_power/$1";
$route['admin_module/(:any)'] = "ybadmin/admin_module/$1";

//script
$route['script/yb_login/(:any)'] = "script/yb_login/$1";

//api
$route['api/account/(:any)'] = "api/api_account/$1";


// $route['default_controller'] = "index/check";
// $route['(:any)'] = 'pagindexes/view/$1';
// $route['404_override'] = '';



// test
$route['news/create'] = 'news/create';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';
$route['checkLogin'] = 'checkLogin';
$route['usedemo'] = 'usedemo';
$route['usedemo/(:any)'] = 'usedemo/$1';
// $route['(:any)'] = '/view/$1';
// $route['default_controller'] = 'pages/view';

/* End of file routes.php */
/* Location: ./application/config/routes.php */