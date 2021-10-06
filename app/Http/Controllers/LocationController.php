<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Member;
use App\Models\Userprofile;

class LocationController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function member(){
        return Member::all();
    }
}
