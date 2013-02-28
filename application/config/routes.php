<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users_interface";
$route['404_override'] = '';

/*************************************************** AJAX INTRERFACE ***********************************************/

$route['admin/auth']				= "ajax_interface/login";
$route['admin/change-position']		= "ajax_interface/change_position";
$route['text-load/:any/from/:num']	= "ajax_interface/text_load";

/*************************************************** USERS INTRERFACE ***********************************************/

$route['logoff']					= "users_interface/logoff";

$route['marriage/series-marriage']	= "users_interface/marriage_series";
$route['marriage/prenuptial']		= "users_interface/prenuptial";
$route['marriage/wedding']			= "users_interface/wedding";
$route['marriage/sliders']			= "users_interface/sliders";
$route['marriage/poly']				= "users_interface/poly";

$route['marriage/reviews']			= "users_interface/reviews";
$route['marriage/reviews/from']		= "users_interface/reviews";
$route['marriage/reviews/from/:num']= "users_interface/reviews";

$route['family/children']			= "users_interface/children";
$route['family/series-family']		= "users_interface/family_series";
$route['portrait']					= "users_interface/portrait";
$route['family']					= "users_interface/family";
$route['genre']						= "users_interface/genre";
$route['fashion']					= "users_interface/fashion";
$route['landscape']					= "users_interface/landscape";
$route['landscape/architecture']	= "users_interface/architecture";
$route['reportage']					= "users_interface/reportage";
$route['photographer']				= "users_interface/photographer";

/*************************************************** ADMIN INTRERFACE ***********************************************/

$route['admin']						= "users_interface/login";
$route['control-panel']				= "admin_interface/control_panel";

$route['control-panel/pages/marriage/sliders'] = "admin_interface/page_sliders";

$route['control-panel/pages/marriage/reviews']				= "admin_interface/page_reviews";
$route['control-panel/pages/marriage/reviews/from'] 		= "admin_interface/page_reviews";
$route['control-panel/pages/marriage/reviews/from/:num']	= "admin_interface/page_reviews";

$route['control-panel/pages/marriage'] 			= "admin_interface/page_images";
$route['control-panel/pages/family'] 			= "admin_interface/page_images";
$route['control-panel/pages/family/children']	= "admin_interface/page_images";
$route['control-panel/pages/portrait']			= "admin_interface/page_images";
$route['control-panel/pages/fashion']			= "admin_interface/page_images";
$route['control-panel/pages/landscape']			= "admin_interface/page_images";
$route['control-panel/pages/genre']				= "admin_interface/page_images";
$route['control-panel/pages/reportage']			= "admin_interface/text_items";
$route['control-panel/pages/photographer']		= "admin_interface/text_items";

$route['control-panel/pages/landscape/:any']	= "admin_interface/page_images";
/* insert items*/
$route['control-panel/pages/:any/insert-item'] = "admin_interface/insert_item";
$route['control-panel/pages/:any/update-item/:num'] = "admin_interface/update_item";

$route['control-panel/pages/family/:any'] = "admin_interface/text_items";
$route['control-panel/pages/marriage/:any'] = "admin_interface/text_items";

$route['control-panel/images/delete/id/:num'] = "admin_interface/images_delete";
$route['control-panel/video/delete/id/:num'] = "admin_interface/video_delete";
$route['control-panel/review/delete/id/:num'] = "admin_interface/review_delete";

$route['control-panel/delete-item/id/:num'] = "admin_interface/item_delete";

$route['control-panel/pages/:any'] = "admin_interface/control_pages";