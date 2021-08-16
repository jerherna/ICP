<?php

namespace App\Http\Controllers;
use App\Exports\AccountExport;
use App\Exports\MemberExport;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function export_accounts(){

        $this->authorize('admin_only');
        return Excel::download(new AccountExport, 'Accounts.xlsx');
    }

    function export_members(){

        $this->authorize('admin_only');
        return Excel::download(new MemberExport, 'Members.xlsx');
    }

    function export_users(){

        $this->authorize('admin_only');
        return Excel::download(new UserExport, 'Users.xlsx');
    }
}
