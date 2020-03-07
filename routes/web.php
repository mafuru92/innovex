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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::group(['middleware' => ['disablepreventback','auth']],function(){

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user','UsersController');
Route::resource('auditresource','AuditsController');
Route::resource('task','AssignmentsController');
Route::get('assignments/{Task}','AssignmentsController@show');
Route::get('assignmentedit/{Task}','AssignmentsController@edit');
Route::get('exportpdf/{Task}','AssignmentsController@exportpdf');
Route::resource('auditschema','AuditschemasController');
Route::get('auditschemaedit/{Auditschema}','AuditschemasController@edit');
Route::get('auditschemas/{Auditschema}','AuditschemasController@show');
Route::get('exportpdf/{Auditschema}','AuditschemasController@exportpdf');

Route::resource('activity','ActivitiesController');
Route::get('activityedit/{Activity}','ActivitiesController@edit');
Route::get('activities/{Activity}','ActivitiesController@show');
Route::get('exportpdf/{Activity}','ActivitiesController@exportpdf');

Route::resource('noproduct','NoproductsController');
Route::get('noproductedit/{Noproduct}','NoproductsController@edit');
Route::get('noproducts/{Noproduct}','NoproductsController@show');
Route::get('exportpdf/{Noproduct}','NoproductsController@exportpdf');

Route::resource('office','OfficesController');
Route::get('officeedit/{Office}','OfficesController@edit');
Route::get('offices/{Office}','OfficesController@show');
Route::get('officework/{Office}','OfficesController@officework');

Route::get('exportpdf','OfficesController@exportpdf');

Route::get('managetimesheetview/{userid}','ActivitiesController@managetimesheetview');
Route::get('managetimesheet','ActivitiesController@managetimesheet');

Route::get('managereportview/{userid}','ActivitiesController@managereportview');
Route::get('managereport','ActivitiesController@managereport');

Route::get('managereportviewa/{userid}','ActivitiesController@managereportviewa');
Route::get('managereporta','ActivitiesController@managereporta');


Route::resource('itembrands','ItembrandsController');
Route::resource('departments','DepartmentsController');
Route::resource('servers','ServersController');
Route::get('allitems','ItemsController@allitems');
Route::get('brands','ItembrandsController@brands');
Route::get('AllCategories','ItemcategorysController@AllCategories');
Route::get('AllDepartments','DepartmentsController@AllDepartments');
Route::get('PysicalServers','ServersController@PysicalServers');
Route::get('exportpdf/{Item}','ItemsController@exportpdf');
Route::get('laptops','ItemsController@laptops');
Route::get('desktops','ItemsController@desktops');
Route::get('serverlist','ItemsController@serverlist');
Route::get('routers','ItemsController@routers');
Route::get('switches','ItemsController@switches');
Route::get('hdprinters','ItemsController@hdprinters');
Route::get('smallprinters','ItemsController@smallprinters');






Route::get('extension','ApprovalinforsController@extension');
Route::get('PReports','ApprovalinforsController@PReports');


Route::get('Allstudiesexport','ApprovalinforsController@Allstudiesexport');
Route::get('StudiesExtensionexport','ApprovalinforsController@StudiesExtensionexport');
Route::get('StudiesReportexport','ApprovalinforsController@StudiesReportexport');
Route::get('exportpdf/{Approvalinfors}','ApprovalinforsController@exportpdf');

Route::resource('trainings','TrainingsController');
Route::get('export','TrainingsController@export');
Route::get('GCPexport','TrainingsController@GCPexport');
Route::get('HSPexport','TrainingsController@HSPexport');
Route::get('MLexport','TrainingsController@MLexport');
Route::get('gcp_gclp','TrainingsController@gcp_gclp');
Route::get('hsp','TrainingsController@hsp');
Route::get('ml','TrainingsController@ml');

Route::resource('audittrail','AudittrailsController');
Route::get('audittrailexport','AudittrailsController@audittrailexport');

Route::resource('user','UsersController');

Route::resource('drugs','DrugsController');
Route::get('exportdrugpdf/{Drug}','DrugsController@exportdrugpdf');
Route::get('Drugsexport','DrugsController@Drugsexport');


});
