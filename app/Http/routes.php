<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Category;

Route::get('/', function () {
	if (Auth::user()) {
		return redirect('/home');
	}
    return view('welcome');
});

Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');

// Route::get('/test', function () {
//     return view('test');
// });

// Route::get('/login', function () {
//     return view('login');
// });



Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/{id}/profile', 'HomeController@show');
Route::get('/{id}/questions', 'HomeController@showques');
Route::get('/profile', 'HomeController@profile');
Route::post('/profile' , 'HomeController@update_avatar');
Route::get('/users', 'HomeController@users');
Route::delete('/user/{user}' , 'HomeController@destroy');
Route::patch('/user/{user}/edit' , 'HomeController@update');
Route::get('/{user}/myQuestions' , 'HomeController@myques');
Route::get('/categories', 'HomeController@cat');

Route::resource('/cat' , 'CategoryController');
Route::resource('/{category}/question' , 'QuestionController');
Route::resource('/{question}/answer' , 'AnswerController');

Route::get('/{quesId}/answerdeletewithajax/{id}', 'AnswerController@destroy');
Route::post('/{id}/answeraddwithajax', 'AnswerController@store');

Route::get('/search', 'SearchController@search');
Route::get('/searchresult', 'SearchController@show');

Route::get('/adminPage', 'VerifyController@admin');
Route::get('/admin/tables', 'VerifyController@tables');
Route::get('/admin/cats', 'VerifyController@cats');
Route::get('/admin/ques', 'VerifyController@ques');
Route::get('/admin/notify', 'VerifyController@notifications');
Route::get('/user/{user}/questions', 'VerifyController@questions');
Route::get('/{user}/ques/{question}/edit', 'VerifyController@questionsEdit');
Route::patch('/user/{user}/question/{question}', 'VerifyController@questionsUpdate');
Route::delete('/question/{question}', 'VerifyController@quesDel');
Route::patch('/user/{user}/status', 'VerifyController@status');





	




// Route::get('/', function () {
//     return view('admin.index');
// });
// Route::get('/', function () {
//     return view('admin.index');
// });
