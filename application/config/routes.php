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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//Admin Routes
$route['login'] 				= 'main/verify';



//Student Routes
$route['student']								= 'student/view_student';
$route['insert_stud']							= 'student/insert_stud';
$route['delete_stud/(:any)']    				= 'student/delete_stud/$1;';

//Faculty Routes
$route['faculty']								= 'faculty/view_faculty';
$route['class']									= 'admin/year_section';
$route['delete_fac/(:any)']						= 'faculty/delete_fac/$1';
$route['faculty_class']							= 'faculty/myclass';
$route['addclass']								= 'faculty/addclass';
$route['view_stud/(:any)']						= 'faculty/view_student/$1';
$route['insert_studentsss']						= 'faculty/insert_students';
$route['delet_stud_class/(:any)/(:any)']		= 'faculty/delet_stud_class/$1/$2';
$route['grade_book']							= 'faculty/grade_book';
$route['view_exam/(:any)']						= 'faculty/view_exam/$1';
$route['view_student_score/(:any)']				= 'faculty/view_student_score/$1';

//Examination Routes
$route['examination']							= 'faculty/examination';
$route['insert_exam']							= 'faculty/insert_exam';
$route['add_question/(:num)']					= 'faculty/add_question/$1';
$route['insert_question']						= 'faculty/insert_question';
$route['delete_questions/(:any)/(:any)']		= 'faculty/delete_questions/$1/$2';
$route['activate_exams']						= 'faculty/activate_exams';
//Admin Routes

//class
$route['insert_class']							= 'admin/insert_class';
$route['delete_class/(:any)']					= 'admin/delete_class/$1';
$route['delete_classes/(:any)']					= 'faculty/delete_classes/$1';
$route['sch_yr']								= 'admin/sch_yr';
$route['insert_sch']							= 'admin/insert_sch';

//subject
$route['subject']								= 'admin/subject';
$route['insert_subject']						= 'admin/insert_subject';
$route['delete_subject/(:any)']					= 'admin/delete_subject/$1';
$route['edit_subject/(:any)']					= 'admin/edit_subject/$1';


//Student

$route['student_examination']					= 'student/student_examination';
$route['take_exam/(:any)']						= 'student/take_exam/$1';
$route['examination_checking/(:any)/(:any)']	= 'student/take_exam/$1/$2';
$route['checked_ans/(:any)']     				= 'student/checked_ans/$1';
$route['student_examination']					= 'student/student_examination';
$route['take_exam/(:any)']						= 'student/take_exam/$1';
$route['examination_checking/(:any)/(:any)']	= 'student/take_exam/$1/$2';
$route['student_class']							= 'student/student_class';
$route['view_lessons/(:any)']					= 'student/view_lessons/$1';
$route['view_pdf/(:any)']						= 'student/view_pdf/$1';


//Lessons 
$route['lessons']								= 'lessons/list_lessons';
$route['upload_lessons']						= 'lessons/upload_lessons';
$route['delete_lessons/(:any)']					= 'lessons/delete_lessons/$1';
$route['logout']								= 'main/logout';
$route['activate_exams/(:any)']					= 'faculty/activate_examination/$1';




