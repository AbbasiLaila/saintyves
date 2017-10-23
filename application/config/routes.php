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

$route['default_controller'] = 'front';

$route['home'] = 'front';
$route['about/(:any)'] = 'front/page/about/$1';
$route['about/vacancies/(:any)'] = 'front/vacancies/$1';

$route['work/(:any)'] = 'front/page/work/$1';
$route['work/programs/(:any)'] = 'front/programs/$1';

$route['news'] = 'front/news';
$route['news/(:any)'] = 'front/newsItem/$1';

$route['donors'] = 'front/donors';
$route['faq'] = 'front/faq';

$route['contact'] = 'front/contact';


$route['admin'] = 'admin';
/*Files*/
$route['admin/files'] = 'files';
$route['admin/files/add'] = 'files/add';

/*Slider*/
$route['admin/slider'] = 'slider';
$route['admin/slider/add'] = 'slider/add';
$route['admin/slider/edit/(:any)'] = 'slider/edit/$1';
$route['slider/delete/(:any)'] = 'slider/delete/$1';


/*Text Pages edit*/
$route['admin/page/(:any)'] = 'admin/page/$1';
$route['admin/content/(:any)'] = 'admin/content/$1';


/*Board*/
$route['admin/board'] = 'board';
$route['admin/board/add'] = 'board/add';
$route['admin/board/edit/(:any)'] = 'board/edit/$1';
$route['board/delete/(:any)'] = 'board/delete/$1';

/*Departments*/
$route['admin/departments'] = 'departments';
$route['admin/departments/add'] = 'departments/add';
$route['admin/departments/edit/(:any)'] = 'departments/edit/$1';
$route['departments/delete/(:any)'] = 'departments/delete/$1';


/*Staff*/
$route['admin/staff'] = 'staff';
$route['admin/staff/add'] = 'staff/add';
$route['admin/staff/edit/(:any)'] = 'staff/edit/$1';
$route['staff/delete/(:any)'] = 'staff/delete/$1';


/*Vacancies*/
$route['admin/vacancies'] = 'vacancies';
$route['admin/vacancies/add'] = 'vacancies/add';
$route['admin/vacancies/edit/(:any)'] = 'vacancies/edit/$1';
$route['vacancies/delete/(:any)'] = 'vacancies/delete/$1';



/*News*/
$route['admin/news'] = 'news';
$route['admin/news/add'] = 'news/add';
$route['admin/news/edit/(:any)'] = 'news/edit/$1';
$route['news/delete/(:any)'] = 'news/delete/$1';

/*Programs*/
$route['admin/programs'] = 'programs';
$route['admin/programs/add'] = 'programs/add';
$route['admin/programs/edit/(:any)'] = 'programs/edit/$1';
$route['programs/delete/(:any)'] = 'programs/delete/$1';


/*Donors*/
$route['admin/donors'] = 'donors';
$route['admin/donors/add'] = 'donors/add';
$route['admin/donors/edit/(:any)'] = 'donors/edit/$1';
$route['donors/delete/(:any)'] = 'donors/delete/$1';

/*Donors*/
$route['admin/faq'] = 'faq';
$route['admin/faq/add'] = 'faq/add';
$route['admin/faq/edit/(:any)'] = 'faq/edit/$1';
$route['faq/delete/(:any)'] = 'faq/delete/$1';

/*Main Issues Category*/
$route['admin/categories'] = 'categories';
$route['admin/categories/add'] = 'categories/add';
$route['admin/categories/edit/(:any)'] = 'categories/edit/$1';
$route['categories/delete/(:any)'] = 'categories/delete/$1';


/*Main Issues*/
$route['admin/issues'] = 'issues';
$route['admin/issues/add'] = 'issues/add';
$route['admin/issues/edit/(:any)'] = 'issues/edit/$1';
$route['issues/delete/(:any)'] = 'issues/delete/$1';



/*Gallery Categories*/
$route['admin/gallery/categories'] = 'gallery/categories';
$route['admin/gallery/categories/add'] = 'gallery/add_category';
$route['admin/gallery/categories/edit/(:any)'] = 'gallery/edit_category/$1';
$route['admin/gallery/categories/delete/(:any)'] = 'gallery/delete_category/$1';

/*Gallery Albums*/
$route['admin/gallery/albums'] = 'gallery/albums';
$route['admin/gallery/albums/add'] = 'gallery/add_album';
$route['admin/gallery/albums/edit/(:any)'] = 'gallery/edit_album/$1';
$route['admin/gallery/albums/delete/(:any)'] = 'gallery/delete_album/$1';

/*Gallery Albums Images*/

$route['admin/gallery/images'] = 'gallery/images';
$route['admin/gallery/images/add'] = 'gallery/add_image';
$route['admin/gallery/images/edit/(:any)'] = 'gallery/edit_image/$1';
$route['admin/gallery/images/delete/(:any)'] = 'gallery/delete_image/$1';



/*Gallery Videos*/

$route['admin/gallery/videos'] = 'gallery/videos';
$route['admin/gallery/videos/add'] = 'gallery/add_video';
$route['admin/gallery/videos/edit/(:any)'] = 'gallery/edit_video/$1';
$route['admin/gallery/videos/delete/(:any)'] = 'gallery/delete_video/$1';


/*Users*/
$route['admin/users'] = 'admin/users';
$route['admin/users/add'] = 'auth/create_user';
$route['admin/users/edit/(:any)'] = 'auth/edit_user/$1';

/*SEO*/
$route['admin/seo/(:any)'] = 'admin/seo/$1';
$route['404_override'] = 'front/show_404';

$route['translate_uri_dashes'] = FALSE;

