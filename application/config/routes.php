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

$route['default_controller'] = 'home';
$route['home'] = 'home';
$route['home/overview'] = 'home';
$route['dept'] = 'dept';
$route['faculty'] = 'faculty';
$route['meriise-manage'] = 'meriise';
$route['admin-manage'] = 'admins';
$route['placement-manage'] = 'placement';
$route['examination-manage'] = 'examination';
$route['aicte-manage'] = 'aicte';
$route['iqac-manage'] = 'iqac';
$route['naac-manage'] = 'naac';
$route['media-manage'] = 'media';
// $route['mcenaac.php?link=4'] = 'home';
$route['home/overview/(:any)'] = 'home/overview/$1';
$route['home/HOD_Details/(:any)'] = 'home/HOD_Details/$1';
$route['home/Programmes/(:any)'] = 'home/Programmes/$1';
$route['home/Committees/(:any)'] = 'home/Committees/$1';
$route['home/Learning-Resources/(:any)'] = 'home/Learning_Resources/$1';
$route['404_override'] = 'home/error404';
$route['translate_uri_dashes'] = TRUE;
$route['mcecse.php'] = 'home/Overview/Computer-Science-and-Engineering';
$route['mcegrivience.php']='home/Grievance-Redressal-Committee';
$route['mceforms.php']='home/Network-Control-Centre';







$route['mcemechanical.php']='home/Overview/Mechanical-Engineering';
$route['mceboard_studies.php']='home/Board-Of-Studies';
$route['mcemou.php']='home/MOU';
$route['mcedisplay_files.php']='home/Syllabus/Computer-Science-and-Engineering';
$route['links/1.2.2.php']='home/matrics/301';
$route['links/1.3.2.php']='home/matrics/302';
$route['mceaicte.php']='home/AICTE';
$route['feedback.php']='home/feedback';
$route['links/2.2.1.php']='home/matrics/320';
$route['mcescience_association.php']='home/Science_Association';
$route['links/2.3.2.php']='home/Initiative/322';
$route['index_links.php']='home/Circulars';
$route['mceresults.php']='home/Results';
$route['mceprocess.php']='home/Process';
$route['links/3.2.2.php']='home/matrics/321';
$route['mcenss.php']='home/National-Service-Scheme';
$route['mcetechnical_club.php']='home/Technical_Club';
$route['mcelibrary.php']='home/Library';
$route['mcegallery.php']='home/Network-Control-Centre';
$route['mcelanguage_lab.php']='home/Others';
$route['mceacademic.php']='home/Programs-Offered';
$route['mcealumni.php']='home/Alumnii';
$route['mcevision.php']='home/Vision-and-Mission';
$route['links/6.3.3.php']='home/matrics/305';

$route['links/6.3.4.php']='home/matrics/306';
$route['links/6.4.1.php']='home/Initiative/290';
$route['links/6.4.2.php']='home/matrics/318';
$route['links/6.4.3.php']='home/Initiative/291';
$route['mce_iqac_details.php']='home/IQAC';

$route['(:any)']['GET'] = 'home/index';