<?php

use Illuminate\Support\Facades\Route;
use App\Models\Account;
use App\Models\Member;
use App\Models\Userprofile;
use App\Models\AccountRequest;
use App\Http\Controllers\Paginators;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChangeRequestController;

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


/*Route::get('/', function () {
    return view('auth.register');
});
*/






Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/account', [App\Http\Controllers\HomeController::class, 'account'])->name('form.account');

Route::get('/member', [App\Http\Controllers\HomeController::class, 'member'])->name('form.member');

Route::get('/userprofile', [App\Http\Controllers\HomeController::class, 'user'])->name('form.user');

/*
Route::post('/account',function(){
    $account = new Account();
    //account details
    $account->church_name = request('ChurchName');
    $account->location = request('Location');
    $account->about = request('About');
    $account->description = request('Description');
    $account->vision = request('Vision');
    $account->mission = request('Mission');
    //contact details
    $account->email = request('Email');
    $account->mobile = request('MobileNo');
    $account->denomination_affiliation = request('DenomAffiliate');
    $account->church_type = request('ChurchType');
    $account->church_and_staff_leaders = request('StaffAndLeaders');
    $account->telephone = request('TelNo');
    $account->facebook_handle = request('SocialFB');
    $account->twitter_handle = request('SocialTwitter');
    $account->instagram_handle = request('SocialInstagram');
    $account->linkedin_handle = request('SocialLinkedIn');
    $account->website_handle = request('SocialWebsite');
    $account->status = request('Status');
    $account->save();
    return redirect('/accountsbyname');
});
*/
Route::post('/createaccount', [App\Http\Controllers\CrudController::class, 'create_account']);

/*Route::post('/member',function(){
    $member = new Member();
    //member details
    $member->church_name = request('ChurchName');
    $member->location = request('Location');
    $member->account_name = request('AcctName');
    $member->account_location = request('AcctLocation');
    $member->about = request('About');
    $member->description = request('Description');
    $member->vision = request('Vision');
    $member->mission = request('Mission');
    //contact details
    $member->email = request('Email');
    $member->mobile = request('MobileNo');
    $member->denomination_affiliation = request('DenomAffiliate');
    $member->church_type = request('ChurchType');
    $member->church_and_staff_leaders = request('StaffAndLeaders');
    $member->telephone = request('TelNo');
    $member->facebook_handle = request('SocialFB');
    $member->twitter_handle = request('SocialTwitter');
    $member->instagram_handle = request('SocialInstagram');
    $member->linkedin_handle = request('SocialLinkedIn');
    $member->website_handle = request('SocialWebsite');
    $member->status = request('Status');
    $member->save();
    return redirect('/membersbyname');
});*/

Route::post('/createmember', [App\Http\Controllers\CrudController::class, 'create_member']);

Route::post('/userprofile',function(){
    $userprofile = new Userprofile();
    //user details
    $userprofile->firstname = request('FirstName');
    $userprofile->middlename = request('MiddleName');
    $userprofile->lastname = request('LastName');
    $userprofile->role = request('Role');
    $userprofile->account_name = request('AcctName');
    $userprofile->account_location = request('AcctLocation');
    $userprofile->org_name = request('Org');
    $userprofile->org_location = request('OrgLocation');
    //contact details
    $userprofile->email = request('Email');
    $userprofile->mobile = request('MobileNo');
    $userprofile->telephone = request('TelNo');
    $userprofile->facebook_handle = request('SocialFB');
    $userprofile->twitter_handle = request('SocialTwitter');
    $userprofile->instagram_handle = request('SocialInstagram');
    $userprofile->linkedin_handle = request('SocialLinkedIn');
    $userprofile->website_handle = request('SocialWebsite');
    //skills
    $userprofile->skill_1 = request('SSkills_1');
    $userprofile->rate_1 = request('SRate_1');
    $userprofile->years_1 = request('SYearsOfExp_1');
    $userprofile->skill_2 = request('SSkills_2');
    $userprofile->rate_2 = request('SRate_2');
    $userprofile->years_2 = request('SYearsOfExp_2');
    $userprofile->skill_3 = request('SSkills_3');
    $userprofile->rate_3 = request('SRate_3');
    $userprofile->years_3 = request('SYearsOfExp_3');
    $userprofile->skill_4 = request('SSkills_4');
    $userprofile->rate_4 = request('SRate_4');
    $userprofile->years_4 = request('SYearsOfExp_4');
    $userprofile->skill_5 = request('SSkills_5');
    $userprofile->rate_5 = request('SRate_5');
    $userprofile->years_5 = request('SYearsOfExp_5');
    $userprofile->save();
    return redirect('/usersbyname');
});

Route::get('accountsbyname', [Paginators::class, 'accounts_by_name']);

Route::get('accountsbylocation', [Paginators::class, 'accounts_by_location']);

Route::get('membersbyname', [Paginators::class, 'members_by_name']);

Route::get('membersbyaccount', [Paginators::class, 'members_by_account']);

Route::get('membersbylocation', [Paginators::class, 'members_by_location']);

Route::get('usersbyname', [Paginators::class, 'userprofiles_by_name']);

Route::get('usersbyaccount', [Paginators::class, 'userprofiles_by_account']);

Route::get('usersbymember', [Paginators::class, 'userprofiles_by_member']);

Route::get('accountrequestview', [Paginators::class, 'account_request_view']);

Route::get('memberrequestview', [Paginators::class, 'member_request_view']);

Route::get('setadminview', [Paginators::class, 'set_admin_view']);



Route::get('showaccount/{id}', [CrudController::class, 'show_account']);
Route::get('editaccount/{id}', [CrudController::class, 'edit_account']);
Route::post('updateaccount', [CrudController::class, 'update_account']);
Route::get('deleteaccount/{id}', [CrudController::class, 'delete_account']);

Route::get('showmember/{id}', [CrudController::class, 'show_member']);
Route::get('editmember/{id}', [CrudController::class, 'edit_member']);
Route::post('updatemember', [CrudController::class, 'update_member']);
Route::get('deletemember/{id}', [CrudController::class, 'delete_member']);
/*Route::get('deletemember/{id}', function($id){
    Member::find($id)->delete();
    return
 });*/

Route::get('showuser/{id}', [CrudController::class, 'show_user']);
Route::get('edituser/{id}', [CrudController::class, 'edit_user']);
Route::post('updateuser', [CrudController::class, 'update_user']);

//Search
Route::get('/searchaccount', [CrudController::class, 'search_account']);
Route::get('/searchmember', [CrudController::class, 'search_member']);
Route::get('/searchuser', [CrudController::class, 'search_user']);

//ChangeRequestAccount
Route::get('requestaccount/{id}', [ChangeRequestController::class, 'change_request_account']);
Route::get('reviewrequestaccount/{id}', [ChangeRequestController::class, 'review_request_account']);
Route::post('sendrequestaccount', [ChangeRequestController::class, 'send_request_account']);
Route::get('approvaccountchange/{id}', [ChangeRequestController::class, 'approve_account_change']);
Route::get('disapproveaccountchange/{id}', [ChangeRequestController::class, 'disapprove_account_request']);

//ChangeRequestMember
Route::get('requestmember/{id}', [ChangeRequestController::class, 'change_request_member']);
Route::get('reviewrequestmember/{id}', [ChangeRequestController::class, 'review_request_member']);
Route::post('sendrequestmember', [ChangeRequestController::class, 'send_request_member']);
Route::get('approvememberchange/{id}', [ChangeRequestController::class, 'approve_member_change']);
Route::get('disapprovememberchange/{id}', [ChangeRequestController::class, 'disapprove_member_request']);

/*Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

//Google Login
//Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
//Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

//Auth::routes();

//Google Login
Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

//Facebook Login
Route::get('/login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);


//Exporting Routes
Route::get('/exportaccounts', [App\Http\Controllers\ExportController::class, 'export_accounts']);
Route::get('/exportmembers', [App\Http\Controllers\ExportController::class, 'export_members']);
Route::get('/exportusers', [App\Http\Controllers\ExportController::class, 'export_users']);

/*
Route::group(['middleware' => 'auth'], function(){
Route::get('/', [HomeController::class, 'account'])->name('account');

});
*/



//Export View Routes
Route::get('/exportaccountview', [HomeController::class, 'account_export_view']);
Route::get('/exportmemberview', [HomeController::class, 'member_export_view']);
Route::get('/exportuserview', [HomeController::class, 'user_export_view']);


//Set Admin
Route::get('setadmin/{id}', [CrudController::class, 'set_admin']);
Route::get('removeadmin/{id}', [CrudController::class, 'remove_admin']);

/*
Route::get('/yo', function()
{
    return 'Hello World';
});
*/

Route::get('/memberlocations', [App\Http\Controllers\LocationController::class, 'member']);


Route::group(['middleware' => 'auth'], function(){
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
    ], function(){
        Route::get('tasks',
            [HomeController::class, 'index'])
            ->name('layouts.dashboard');
    });

    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
    ], function(){
        Route::get('tasks',
            [HomeController::class, 'index'])
            ->name('layouts.dashboard');
    });
});
