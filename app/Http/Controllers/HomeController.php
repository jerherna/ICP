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
        $accounts=Account::All();
        $members=Member::All();
        $users=Userprofile::All();
        return view('layouts.dashboard', compact('accounts','members','users'));
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

    public function account_export_view()
    {
        $this->authorize('admin_only');
        return view ('export.exportaccount');
    }

    public function member_export_view()
    {
        $this->authorize('admin_only');
        return view ('export.exportmember');
    }

    public function user_export_view()
    {
        $this->authorize('admin_only');
        return view ('export.exportuser');
    }
}
