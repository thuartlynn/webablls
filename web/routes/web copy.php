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
//Home Page
Route::get('/', function () {
    return view('index');
}) ->name('index');

//Privacy Policy
Route::get('/privacy',function () {
    return view('privacy');
});
//Terms and Conditions 
Route::get('/terms',function () {
    return view('terms');
});
//System Requirements
Route::get('/system_require',function () {
    return view('system_require');
});
//Contact Support
Route::get('/index_contact',function () {
    return view('index_contact');
});
//Toolkit
Route::get('/Toolkit',function () {
    return view('Toolkit');
});

//VideoIndex
Route::get('/VideoIndex',function () {
    return view('Video');
});
//Appendix Index
Route::get('/AppendixIndex',function () {
    return view('Appendix');
});
//Announcement Multi-language
Route::get('/Announcement/Multi-language',function () {
    return view('Announcement_Page');
});

//Purchase Page
Route::group(['prefix' => 'purchase'],function() {
    Route::get('/', 'PurchaseController@show');    
    Route::get('/details','PurchaseController@showDetail');
    Route::get('/payment','PurchaseController@showPayment');
    Route::get('/done','PurchaseController@showDone');
    Route::post('/','PurchaseController@CreateDetail');
    Route::post('/details','PurchaseController@CreatePayment');
    Route::post('/payment','PurchaseController@CheckPayment');   
    Route::post('/completed','PurchaseController@PaymentDone');        
});

//Login 
Route::get('/login'  , 'Auth\LoginController@showLoginForm')->name('login'); 
Route::post('/login' , 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//Forget Password
Route::group(['prefix' => 'password','namespace'=>'Auth'],function() {
     Route::get('reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
     Route::post('email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
     Route::get('/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
     Route::post('/reset/{token}', 'ResetPasswordController@reset')->name('password.update');
});

//Email Verfication
Route::group(['prefix' => 'email','namespace'=>'Auth'],function() {
    Route::get('verify', 'VerificationController@show')->name('verification.notice');
    Route::get('verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify');
    Route::post('resend', 'VerificationController@resend')->name('verification.resend');
});

//Dashboard
Route::group(['prefix' => 'Dashboard'],function() {
    Route::get('/', 'DashboardController@show');    
    Route::post('/Add', 'DashboardController@AddToDo');    
    Route::post('/Remove', 'DashboardController@RemoveToDo');    
});

//Contact
Route::group(['prefix' => 'Contact'],function() {
    Route::get('/', 'ContactController@show');    
    Route::get('/Add', 'ContactController@showAdd');        
});

//Student 
Route::group(['prefix' => 'Student'],function() {
     Route::get('/List','StudentController@showList');
     Route::get('/AddStudent','StudentController@showAddStudent');
     Route::get('/ViewSummary/{Seat_id}','StudentController@showViewSummary');
     Route::get('/ViewProfile/{Seat_id}','StudentController@showSeatProfile');
     Route::get('/TotalGridView/{Seat_id}','StudentController@showTotalGride');
     Route::get('/Assessments/{Seat_id}','StudentController@showAssessment');
     Route::get('/ViewReports/{Seat_id}','StudentController@showReportList');
     Route::get('/ShareStudent/{Seat_id}','StudentController@showSharePermission');
     Route::get('/History/{Seat_id}','StudentController@showHistoryList');
     Route::get('/Files/{Seat_id}','StudentController@showFileList');
     Route::get('/Notes/{Seat_id}','StudentController@showNotesList');
     Route::get('/AnalyticsList/{Seat_id}','StudentController@showAnalyticsList');
     Route::get('/AddAnalysis/{Seat_id}','StudentController@showAddAnalysis');
     Route::get('/AddAssess/{Seat_id}','StudentController@showAddAssessment');
     Route::post('/AddAnalysis/{Seat_id}','StudentController@AddAnalysis');
     Route::post('/addstudent','StudentController@AddStudent');     
});
//Account 
Route::group(['prefix' => 'Account'],function() {
    Route::get('/', 'AccountController@show');
    Route::get('ChangeDetails','AccountController@show_ChangeDetails');
    Route::get('ChangeEmail','AccountController@show_ChangeEmail');
    Route::get('Language','AccountController@show_ChangeLanguage');
    Route::get('ChangePassword','AccountController@show_ChangePassword');
    Route::post('ChangeEmail','AccountController@ChangeEmail');
    Route::post('ChangeDetails','AccountController@ChangeDetails');
    Route::post('ChangePassword','AccountController@ChangePassword');
    Route::post('LanguageChange','AccountController@ChangeLanguage');
});

//Assessment 
Route::group(['prefix' => 'Assessment'],function() {
    Route::get('/', 'AssessmentController@show');
    Route::get('/Details/{Assid}','AssessmentController@showDetail');
    Route::get('/TgvGridEdit/{Assid}','AssessmentController@TgvGridEdit');
    Route::get('/TgvTextEdit/{Assid}','AssessmentController@TgvTextEdit');
    Route::get('/TgvCatEdit/{Assid}','AssessmentController@TgvCatEdit');
    Route::get('/TgvGrid/{Assid}','AssessmentController@TgvGridView');
    Route::get('/CompletedItems/{id}','AssessmentController@showCompleted');
    Route::get('/IncompletedItems/{id}','AssessmentController@showInCompleted'); 
    Route::get('/TgvGridEdit/{Assid}/{Skill_ID}','AssessmentController@showTaskInfoBox');    
    Route::post('/TgvEditSave','AssessmentController@TgvGridEditSaving');
});

//Analysis
Route::group(['prefix' => 'analysis list'],function() {
    Route::get('/', 'AnalysisController@show');
    Route::get('/View/{id}', 'AnalysisController@showView');
    Route::get('/ChangeDetails/{Analysis_id}','AnalysisController@showDetail');
    Route::post('/remove','AnalysisController@RemoveAnalysis');
    Route::post('/ChangeDetails/{Analysis_id}','AnalysisController@UpdateDetail');
});
//ReportList
Route::group(['prefix' => 'ReportList'],function() {
    Route::get('/', 'ReportController@show');
});
Route::group(['prefix' => 'Report'],function() {
    Route::get('/edit/{id}', 'ReportController@showDetail');
});
//Organization 
Route::group(['prefix' => 'Organization'],function() {
    Route::get('/View', 'OrganizationController@showDeatail');
    Route::get('/Settings', 'OrganizationController@showSetting');    
    Route::get('/Users','OrganizationController@showUsers');
    Route::get('/AddUser','OrganizationController@showAddUsers');
    Route::get('/StudentParameter','OrganizationController@showStudentPara');
    Route::get('/ArchivedStudents','OrganizationController@showArchivedStudnet');
    Route::get('/ArchivedStudents/Delete/{Seat_id}','OrganizationController@DeleteArchivedStudents');
    Route::get('/ArchivedStudents/Unarchive/{Seat_id}','OrganizationController@UnarchiveStudents');
    Route::get('/Students','OrganizationController@showStudent');
    Route::get('/Students/Archive/{Seat_id}','OrganizationController@ArchiveStudents');
    Route::get('/Students/UserLinks/{Seat_id}','OrganizationController@showStudentPermission');
    Route::get('/Addresses','OrganizationController@showAddress');
    Route::get('/AddressDelete/{Add_id}','OrganizationController@DeleteAddress');
    Route::get('/OpenOrder', 'OrganizationController@showOpenOrder');
    Route::get('/Orders', 'OrganizationController@ShowOrders');
    Route::get('/Manage/{User_id}', 'OrganizationController@ShowUserProfile');
    Route::get('/Manage/Students/{User_id}', 'OrganizationController@ShowUserAllStudent');
    Route::get('/Manage/Students/Replace/{User_id}/{Seat_id}','OrganizationController@ShowReplace');    
    Route::get('/Manage/Block/{User_id}', 'OrganizationController@BlockUser');
    Route::get('/Manage/Unblock/{User_id}', 'OrganizationController@UnBlockUser');
    Route::get('/Manage/Delete/{User_id}', 'OrganizationController@DeleteUser');
    Route::get('/Manage/SetPassword/{User_id}', 'OrganizationController@ShowSetUserPassword');
    Route::get('/Manage/Type/{User_id}','OrganizationController@ShowUserRole');
    Route::get('/Manage/ReplaceAll/{User_id}','OrganizationController@ShowReplaceAll');
    Route::get('/Manage/UserLinks/{User_id}','OrganizationController@ShowUserPermission');
    Route::get('/Students/EditProfile/{Seat_id}','OrganizationController@ShowStudentProfile');
    Route::post('/Settings','OrganizationController@UpdateTimeout');
    Route::post('Type/{User_id}','OrganizationController@UpdateUserRole');    
    Route::post('/AddUser','OrganizationController@AddNewUser');
    Route::post('/SetPassword/{User_id}', 'OrganizationController@SetUserPassword');
    Route::post('/Manage/{User_id}', 'OrganizationController@UpdateUserProfile');    
    Route::post('/AddressAdd','OrganizationController@AddNewAddress');
    Route::post('/AddressEdit/{Add_id}','OrganizationController@UpdateAddress');
    Route::post('/Manage/ReplaceAll/{User_id}','OrganizationController@TransferUserPermission');    
    Route::post('/UserLinks/{User_id}','OrganizationController@UpdateUserPermission');
    Route::post('/Manage/Students/Replace/{User_id}/{Seat_id}','OrganizationController@TransferSeatPermission');  
    Route::post('/StudentParameter','OrganizationController@UpdateStudentPara');
    Route::post('/Students/UserLinks/AddContact','ContactController@AddContact');
    Route::post('/Students/UserLinks/{Seat_id}','OrganizationController@UpdateStudentPermission');
    Route::post('/Students/EditProfile/{Seat_id}','OrganizationController@UpdateStudentProfile');

});

Route::get('Student_notes', function () {
    return view('Student_notes');
}) ->name('Student_notes/?filter=all');

Route::get('Student_assessment_detail', function () {
    return view('Student_assessment_detail');
}) ->name('Student_assessment_detail');

Route::get('Test_', function () {
    return view('Test_');
}) ->name('Test_');