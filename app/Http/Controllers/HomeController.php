<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Member;
use App\Models\Userprofile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     *@return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=Member::All();
        return view('layouts.dashboard', ['members'=>$data]);
    }

    public function account()
    {
        return view('form.account');
    }

    public function member()
    {
        return view('form.member');
    }

    public function user()
    {
        return view('form.user');
    }
}
