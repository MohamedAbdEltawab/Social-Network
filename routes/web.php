<?php







Route::group(['middleware' => ['web']], function () {

Route::get('/', function () {

	
    return view('welcome');
});
    
Auth::routes();

//======================   Get Main Page Or Home Page   ====================
Route::get('/home', 'HomeController@index')->name('home');

//======================   Store Post   ====================================  
Route::post('home/posts/{id}', 'PostsController@store');

//======================   Store Comment   =================================   
Route::post('comments/{userid}/{postid}', 'CommentsController@store');

//======================   Get User Account   ============================== 
Route::get('account/{id}', 'UseraccountController@getAccount');

//======================   Get User About   ================================
Route::get('account/{id}/about', 'UseraccountController@getUserAbout');

//======================   Get User Friends   ==============================
Route::get('account/{id}/friends', 'UseraccountController@getUserFriends');

//======================   Get Profile Page  =============================== 
Route::get('profile/{id}', 'ProfileController@getprofile');

//======================   Get about Page  =================================
Route::get('profile/{id}/about', 'ProfileController@getAbout');

//======================   Get Friends Page  ===============================
Route::get('profile/{id}/friends', 'ProfileController@getFriends');

//======================   Store Background Image To User  ==================
Route::post('profile/{id}/background', 'ProfileController@storeBackground');

//======================   Store Personal Image To User  ====================
Route::post('profile/{id}/personal', 'ProfileController@storePersonal');

//======================   Get Setting Account  =============================
Route::get('settings/{id}', 'HomeController@getSettings');

//======================   Update Setting Account  ==========================
Route::post('settings/{id}/update', 'HomeController@updateSettings');

//======================   Get Search   =====================================
Route::post('search/', 'HomeController@search');

//======================   Store Replies   ==================================
Route::post('replies/{userid}/{postid}/{commentid}', 'RepliesController@store');

//======================   Send Friend Request and store to friend table  ====
Route::post('request/friend/{userid}', 'FriendsController@storeAsender');

//======================   Confirm Friend Request   ==========================
Route::post('confirm/{senderid}', 'FriendsController@storeAreceiver');

//======================   Get Messages   ====================================
Route::get('messages', 'MessengerController@getMessenger');

//======================   Get Messages User_id ==============================
Route::get('messages/{userid}', 'MessengerController@getMessageUser');

//======================   Add Message to conversation =======================
Route::post('addMessage/{id}', 'MessengerController@storeAjax');



});
