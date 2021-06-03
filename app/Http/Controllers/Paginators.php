<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Member;
use App\Models\Userprofile;

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

    function members_by_name(){
        $data=Member::paginate(5);
        return view('paginations.members', ['members'=>$data]);
    }

    function userprofiles_by_name(){
        $data=Userprofile::paginate(5);
        return view('paginations.userprofiles', ['userprofiles'=>$data]);
    }
}
