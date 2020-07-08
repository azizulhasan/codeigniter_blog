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
// $route['default_controller'] = 'blog';



$route['default_controller'] = 'blog';


$route['about'] = 'blog/about';
$route['add_blog_comment'] = 'blog/add_blog_comment';


// blog front managemetn
$route['post'] = 'blog/post';
$route['contact'] = 'blog/contact';
$route['search/search_keyword'] = 'blog/search_keyword';
$route['category/(:num)'] = 'blog/category_post';
$route['tag/(:num)'] = 'blog/tag_post';
$route['subscribe/store'] = 'blog/user_subscriber';
$route['email_send/send'] = 'blog/send';
// blog front managemetn


// subscriber management  advertise management
$route['dashboard/(:num)'] = 'DashboardController/index';
// $route['dashboard/index'] = 'DashboardController/index';


// blog admin management 

$route['admin/index'] = 'BlogCrudController';
$route['admin/store'] = 'BlogCrudController/store';
$route['admin/get_blog_by_id'] = 'BlogCrudController/get_blog_by_id';
$route['admin/get_sub_category_by_id'] = 'BlogCrudController/get_sub_category';
$route['admin/delete'] = 'BlogCrudController/delete';
$route['admin/register_add'] = 'blog/register_add';
// blog admin management


// user management
$route['admin/user_management'] = 'UserController/user_management';
$route['admin/user/store'] = 'UserController/store';
$route['admin/user/get_by_id'] = 'UserController/get_by_id';
$route['admin/user/delete'] = 'UserController/delete';


// category management
$route['admin/category_management'] = 'CategoryController/category_management';
$route['admin/category/store'] = 'CategoryController/store';
$route['admin/category/get_by_id'] = 'CategoryController/get_by_id';
$route['admin/category/delete'] = 'CategoryController/delete';

// sub_category management
$route['admin/sub_category_management'] = 'SubCategoryController/sub_category_management';
$route['admin/sub_category/store'] = 'SubCategoryController/store';
$route['admin/sub_category/get_by_id'] = 'SubCategoryController/get_by_id';
$route['admin/sub_category/delete'] = 'SubCategoryController/delete';

// tag management
$route['admin/tag_management'] = 'TagController/tag_management';
$route['admin/tag/store'] = 'TagController/store';
$route['admin/tag/get_by_id'] = 'TagController/get_by_id';
$route['admin/tag/delete'] = 'TagController/delete';



// position management
$route['admin/position_management'] = 'PositionController/position_management';
$route['position/store'] = 'PositionController/store';
$route['admin/position/delete'] = 'PositionController/delete';
$route['admin/position/get_by_id'] = 'PositionController/get_by_id';





// login and logout
$route['logout'] = 'BlogCrudController/logout';
$route['admin/logout'] = 'BlogCrudController/logout';
$route['admin/register_confirm'] = 'BlogCrudController/register_confirm';


$route['admin/login'] = 'logincontroller/login';

$route['admin/check'] = 'logincontroller/check';
$route['post/(:num)/admin/check'] = 'logincontroller/check';
$route['register'] = 'blog/register';
// login and logout


$route['image'] = 'ImageController';

$route['post/(:num)'] = 'blog/post/$1';
$route['(:any)/(:num)/(:any)'] = 'blog/$1/$1/$1';

// check for login


$route['(:any)/(:num)'] = 'blog/$1/$1';

// $route['(:num)'] = 'blog/$1';

// $route['(:num)/(:any)'] = 'blog';
$route['(:num)'] = 'blog';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
