<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// User Routes

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['verify' => true ]);
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/courses/{slug}', 'CourseController@index');


Route::post('/courses/{slug}', 'CourseController@enroll');


Route::get('/courses/{slug}/quizzes/{name}', 'QuizController@index');

Route::post('/courses/{slug}/quizzes/{name}', 'QuizController@submit');

Route::get('/search', 'SearchController@index');


Route::get('/tracks/{name}', 'TrackController@index');

Route::get('/mycourses', 'MyCoursesController@index');

Route::get('/profile', 'ProfileController@index');

Route::post('/profile', 'ProfileController@update');

Route::get('/allcourses', 'AllcoursesController@index');

 Route::get('/contact', "ContactController@index");

 Route::post('/contact', "ContactController@sendEmail");

 Route::get('/alltracks', "allTrackController@index");


// Logout 

Route::get('/logout', function() {
	if(\Auth::check()) {
		\Auth::logout();
		return redirect('/home');
	}else {
		return redirect('/');
	}
})->name('logout');

// Admin Routes 


Route::group(['middleware' => ['auth', 'admin'] ], function () {


	Route::get('admin', function() {
		return redirect('admin/dashboard');
	});

	Route::get('admin/dashboard', 'Admin\HomeController@index')->name('home');

	Route::resource('admin/admins', 'Admin\AdminController', ['except' => ['show']]);

	Route::resource('admin/users', 'Admin\UserController', ['except' => ['show']]);


	Route::resource('admins/tracks', 'Admin\TrackController');

	Route::resource('admins/tracks.courses', 'Admin\trackCourseController');


	Route::resource('admin/courses', 'Admin\courseController');

	Route::resource('admin/courses.videos', 'Admin\CourseVideoController');
	
	Route::resource('admin/courses.quizzes', 'Admin\CourseQuizController');


	Route::resource('admin/videos', 'Admin\VideoController');


	Route::resource('admin/questions', 'Admin\questionController', ['except' => ['show']]);

	Route::resource('admin/quizzes', 'Admin\QuizController');



	Route::resource('admin/quizzes.questions', 'Admin\QuizQuestionController');


	Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'Admin\ProfileController@edit']);
	
	Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'Admin\ProfileController@update']);
	
	Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'Admin\ProfileController@password']);


});

