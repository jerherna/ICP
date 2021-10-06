<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Member;
use App\Models\Userprofile;
use App\Models\AccountRequest;
use App\Models\User;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

//use DB;

class CrudController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }



    //ACCOUNT CRUD//
    function show_account($id){

        $data = DB::table('accounts')
            ->where('id', $id)
            ->first();

        $audits = Account::find($id)->audits;

        //return view('show.showaccount', $data);
        return view('show.showaccount', compact('audits','data'));
    }


    function edit_account($id){

        $this->authorize('admin_only');

        $row = DB::table('accounts')
            ->where('id', $id)
            ->first();
        $data = [
            'Info' => $row
        ];

        return view('edit.editaccount', $data);
    }


    function update_account(Request $request){

        $this->authorize('admin_only');

        $todayDate = Carbon::now()->toDateTimeString();

            Account::find($request->input('cid'))
            ->update([
                'church_name'=>$request->input('ChurchName'),
                'location' => $request->input('Location'),
                'about' => $request->input('About'),
                'description' => $request->input('Description'),
                'vision' => $request->input('Vision'),
                'mission' => $request->input('Mission'),
                'email' => $request->input('Email'),
                'mobile' => $request->input('MobileNo'),
                'denomination_affiliation' => $request->input('DenomAffiliate'),
                'church_type' => $request->input('ChurchType'),
                'church_and_staff_leaders' => $request->input('StaffAndLeaders'),
                'telephone' => $request->input('TelNo'),
                'facebook_handle' => $request->input('SocialFB'),
                'twitter_handle' => $request->input('SocialTwitter'),
                'instagram_handle' => $request->input('SocialInstagram'),
                'linkedin_handle' => $request->input('SocialLinkedIn'),
                'website_handle' => $request->input('SocialWebsite'),
                'status' => $request->input('Status')
            ]);
        return redirect('accountsbyname');
    }


    function delete_account($id){
        $this->authorize('admin_only');
        Account::find($id)->delete();
        return redirect()->back();
    }
    //END ACCOUNT CRUD

    //MEMBER CRUD
    function show_member($id){
        $data = DB::table('members')
            ->where('id', $id)
            ->first();

        $audits = Member::find($id)->audits;
            
        return view('show.showmember', compact('audits','data'));
    }


    function update_member(Request $request){
        
        $this->authorize('admin_only');

            Member::find($request->input('cid'))
            ->update([
                'church_name' => $request->input('ChurchName'),
                'location' => $request->input('Location'),
                'account_name' => $request->input('AcctName'),
                'account_location' => $request->input('AcctLocation'),
                'about' => $request->input('About'),
                'description' => $request->input('Description'),
                'vision' => $request->input('Vision'),
                'mission' => $request->input('Mission'),
                'email' => $request->input('Email'),
                'mobile' => $request->input('MobileNo'),
                'denomination_affiliation' => $request->input('DenomAffiliate'),
                'church_type' => $request->input('ChurchType'),
                'church_and_staff_leaders' => $request->input('StaffAndLeaders'),
                'telephone' => $request->input('TelNo'),
                'facebook_handle' => $request->input('SocialFB'),
                'twitter_handle' => $request->input('SocialTwitter'),
                'instagram_handle' => $request->input('SocialInstagram'),
                'linkedin_handle' => $request->input('SocialLinkedIn'),
                'website_handle' => $request->input('SocialWebsite'),
                'status' => $request->input('Status')
            ]);
        return redirect('membersbyname');
    }

    function edit_member($id){
        $this->authorize('admin_only');

        $row = DB::table('members')
            ->where('id', $id)
            ->first();
        $data = [
            'Info' => $row
        ];
        return view('edit.editmember', $data);
    }



    function delete_member($id){
        $this->authorize('admin_only');
        Member::find($id)->delete();
        return redirect()->back();
    }
    //END MEMBER CRUD



    //USER CRUD
    function show_user($id){
        $row = DB::table('userprofiles')
            ->where('id', $id)
            ->first();
        $data = [
            'Info' => $row
        ];
        return view('show.showuser', $data);
    }


    function edit_user($id){

        $this->authorize('admin_only');

        $row = DB::table('userprofiles')
            ->where('id', $id)
            ->first();
        $data = [
            'Info' => $row
        ];

        return view('edit.edituser', $data);
    }


    //END USER CRUD 




    //SEARCH
    function search_account(){
        if(isset($_GET['inputSearch'])){
            $search_text = $_GET['inputSearch'];
            $data = Account::where('church_name', 'LIKE', '%'.$search_text.'%')
            ->orWhere('location', 'LIKE', '%'.$search_text.'%')
            ->orWhere('email', 'LIKE', '%'.$search_text.'%')
            ->orWhere('mobile', 'LIKE', '%'.$search_text.'%')
            ->orWhere('denomination_affiliation', 'LIKE', '%'.$search_text.'%')
            ->orWhere('church_type', 'LIKE', '%'.$search_text.'%')
            ->orWhere('telephone', 'LIKE', '%'.$search_text.'%')
            ->orWhere('facebook_handle', 'LIKE', '%'.$search_text.'%')
            ->orWhere('twitter_handle', 'LIKE', '%'.$search_text.'%')
            ->orWhere('instagram_handle', 'LIKE', '%'.$search_text.'%')
            ->orWhere('linkedin_handle', 'LIKE', '%'.$search_text.'%')
            ->orWhere('website_handle', 'LIKE', '%'.$search_text.'%')
            ->paginate(10);
            return view('paginations.accounts', ['accounts'=>$data]);
        }
        else{
            echo 'no records found';
        }
    }

    function search_member(){
        if(isset($_GET['inputSearch'])){
            $search_text = $_GET['inputSearch'];
            $data = Member::where('church_name', 'LIKE', '%'.$search_text.'%')
            ->orWhere('location', 'LIKE', '%'.$search_text.'%')
            ->orWhere('email', 'LIKE', '%'.$search_text.'%')
            ->orWhere('mobile', 'LIKE', '%'.$search_text.'%')
            ->paginate(10);
            return view('paginations.members', ['members'=>$data]);
        }
        else{
            echo 'no records found';
        }
    }

    function search_user(){
        if(isset($_GET['inputSearch'])){
            $search_text = $_GET['inputSearch'];
            $data = Userprofile::where('firstname', 'LIKE', '%'.$search_text.'%')
            ->orWhere('middlename', 'LIKE', '%'.$search_text.'%')
            ->orWhere('lastname', 'LIKE', '%'.$search_text.'%')
            ->paginate(10);
            return view('paginations.userprofiles', ['userprofiles'=>$data]);
        }
        else{
            echo 'no records found';
        }
    }

    //SET ADMIN CONTROLS
    function set_admin($id){

        $this->authorize('admin_only');

            User::find($id)
            ->update([
                'is_admin'=> 1,

            ]);

        return redirect()->back();
    }

    function remove_admin($id){

        $this->authorize('admin_only');

            User::find($id)
            ->update([
                'is_admin'=> 0,

            ]);

        return redirect()->back();
    }

}
