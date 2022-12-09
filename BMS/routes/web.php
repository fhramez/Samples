<?php

use App\Http\Controllers\ApartmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\InvoiceController;
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
    return view('index');
});

Route::group(['prefix'=>'Auth'], function()
{
	Route::get('SignUp',						[AuthController::class, 'SignUp']);
	Route::get('SignUp_Submit',            		[AuthController::class, 'SignUp_Submit']);
	Route::get('Login',							[AuthController::class, 'Login']);
	Route::get('Login_Submit',					[AuthController::class, 'Login_Submit']);
    Route::get('Logout',                   		[AuthController::class, 'Logout']);
	Route::get('Profile',						[AuthController::class, 'Profile']);
	Route::get('Profile_Submit',				[AuthController::class, 'Profile_Submit']);
});

Route::group(['prefix'=>'Property'], function()
{
	Route::get('List',								[BuildingController::class, 'List']);
	Route::get('BuildingDetails/{building}',		[BuildingController::class, 'BuildingDetails']);
	Route::get('OwnerDetails/{apartment}',			[BuildingController::class, 'OwnerDetails']);
});

Route::group(['prefix'=>'Building'], function()
{
	Route::get('New',								[BuildingController::class, 'New']);
	Route::get('New_Submit',						[BuildingController::class, 'New_Submit']);
	Route::get('Connect',							[BuildingController::class, 'Connect']);
	Route::get('Connect_Submit',					[BuildingController::class, 'Connect_Submit']);
	Route::get('Edit/{building}',					[BuildingController::class, 'Edit']);
	Route::get('Edit_Submit/{building}',			[BuildingController::class, 'Edit_Submit']);
	Route::get('Delete/{building}',					[BuildingController::class, 'Delete']);
	Route::get('Delete_Submit/{building}',			[BuildingController::class, 'Delete_Submit']);

	Route::group(['prefix' => 'Manager'], function()
	{
		Route::get('Add/{building}',						[BuildingController::class, 'AddManager']);
		Route::get('Add_Submit/{building}',					[BuildingController::class, 'AddManager_Submit']);
		Route::get('List/{building}',						[BuildingController::class, 'Managers']);
		Route::get('Delete/{manager}/{building}',			[BuildingController::class, 'ManagerDelete']);
		Route::get('Delete_Submit/{manager}/{building}',	[BuildingController::class, 'ManagerDelete_Submit']);
	});
});

Route::group(['prefix'=>'Announcement'], function()
{
	Route::get('List/{building}',			[AnnouncementController::class, 'List']);
	Route::get('New/{building}',			[AnnouncementController::class, 'New']);
	Route::get('New_Submit/{building}',		[AnnouncementController::class, 'New_Submit']);
	Route::get('Edit/{announcement}',		[AnnouncementController::class, 'Edit']);
	Route::get('Edit_Submit/{announcement}',[AnnouncementController::class, 'Edit_Submit']);
	Route::get('Delete/{announcement}',		[AnnouncementController::class, 'Delete']);
	Route::get('Delete_Submit/{announcement}',[AnnouncementController::class, 'Delete_Submit']);
	Route::get('Details/{announcement}',	[AnnouncementController::class, 'Details']);
	Route::get('Views/{announcement}',		[AnnouncementController::class, 'Views']);
});


Route::group(['prefix'=>'Apartment'], function()
{
	Route::get('New',						[ApartmentController::class, 'New']);
	Route::get('New_Submit',				[ApartmentController::class, 'New_Submit']);
	Route::get('Edit/{apartment}',			[ApartmentController::class, 'Edit']);
	Route::get('Edit_Submit/{apartment}',	[ApartmentController::class, 'Edit_Submit']);
	Route::get('Delete/{apartment}',		[ApartmentController::class, 'Delete']);
	Route::get('Delete_Submit/{apartment}',	[ApartmentController::class, 'Delete_Submit']);
	Route::get('List/{building}',			[ApartmentController::class, 'List']);
	
	Route::group(['prefix'=>'Rent'], function()
	{
		Route::get('New',						[ApartmentController::class, 'Rent']);
		Route::get('New_Submit',				[ApartmentController::class, 'Rent_Submit']);
	});
});

Route::group(['prefix'=>'Transaction'], function()
{
	Route::get('List/{building}',			 [TransactionController::class, 'List']);
	Route::get('New/{building}',			 [TransactionController::class, 'New']);
	Route::get('New_Submit/{building}',		 [TransactionController::class, 'New_Submit']);
	Route::get('Edit/{transaction}',		 [TransactionController::class, 'Edit']);
	Route::get('Edit_Submit/{transaction}',	 [TransactionController::class, 'Edit_Submit']);
	Route::get('Delete/{transaction}',		 [TransactionController::class, 'Delete']);
	Route::get('Delete_Submit/{transaction}',[TransactionController::class, 'Delete_Submit']);
	Route::get('Details/{transaction}'		,[TransactionController::class, 'Details']);

});

Route::group(['prefix'=>'Invoice'], function()
{
	Route::get('PaymentList/{apartment}',	[InvoiceController::class, 'PaymentList']);
	Route::get('List/{apartment}',			[InvoiceController::class, 'List']);
	Route::get('Pay/{invoice}',				[InvoiceController::class, 'Pay']);
	Route::get('PeymentDone/{invoice}',		[InvoiceController::class, 'PaymentDone']);
});

