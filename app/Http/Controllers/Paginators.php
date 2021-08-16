<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Member;
use App\Models\Userprofile;
use App\Models\User;
use App\Models\AccountRequest;

class Paginators extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    function accounts_by_name(){
        $data=Account::paginate(5);
        return view('paginations.accounts', ['accounts'=>$data]);
    }

    function accounts_by_location(){
        $data=Account::orderBy('location')->paginate(5);
        return view('paginations.accountsbylocation', ['accounts'=>$data]);
    }

    function members_by_name(){
        $data=Member::paginate(5);
        return view('paginations.members', ['members'=>$data]);
    }

    function members_by_account(){
        $data=Member::orderBy('church_name')->paginate(5);
        return view('paginations.membersbyaccount', ['members'=>$data]);
    }

    function members_by_location(){
        $data=Member::orderBy('location')->paginate(5);
        return view('paginations.membersbylocation', ['members'=>$data]);
    }

    function userprofiles_by_name(){
        $data=Userprofile::paginate(5);
        return view('paginations.userprofiles', ['userprofiles'=>$data]);
    }

    function userprofiles_by_account(){
        $data=Userprofile::orderBy('account_name')->paginate(5);
        return view('paginations.userprofilesbyaccount', ['userprofiles'=>$data]);
    }

    function userprofiles_by_member(){
        $data=Userprofile::orderBy('org_name')->paginate(5);
        return view('paginations.userprofilesbymember', ['userprofiles'=>$data]);
    }

    /*function account_request_view(){
        $data=AccountRequest::orderBy('id')->paginate(5);
        return view('paginations.accountrequest', ['userprofiles'=>$data]);
    }*/

    function account_request_view(){
        $data=AccountRequest::orderBy('requestor')->paginate(5);
        return view('paginations.accountrequest', ['account_requests'=>$data]);
    }

    function set_admin_view(){
        $this->authorize('admin_only');
        $data=User::orderBy('name')->paginate(5);
        return view('paginations.setadmin', ['users'=>$data]);
    }
}
