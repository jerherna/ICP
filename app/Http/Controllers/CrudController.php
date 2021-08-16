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
        /*$row = DB::table('accounts')
            ->where('id', $id)
            ->first();*/

        $data = DB::table('accounts')
            ->where('id', $id)
            ->first();
        /*$data = [
            'Info' => $row
        ];*/

        $audits = Account::find($id)->audits;

        //return view('show.showaccount', $data);
        return view('show.showaccount', compact('audits','data'));
    }
    
    function review_request_account($id){
        /*$row = DB::table('account_requests')
            ->where('id', $id)
            ->first();
        $data = [
            'Info' => $row
        ];*/

        $data = DB::table('account_requests')
            ->where('id', $id)
            ->first();

        $audits = AccountRequest::find($id)->audits;
        //return view('show.showrequestaccount', $data);
        return view('show.showrequestaccount', compact('audits', 'data'));
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



    function change_request_account($id){

        $row = DB::table('accounts')
            ->where('id', $id)
            ->first();
        $data = [
            'Info' => $row
        ];

        return view('request.requestaccount', $data);
    }



    function approve_account_change($id){

        $todayDate = Carbon::now()->toDateTimeString();

        $row = DB::table('account_requests')
            ->where('id', $id)
            ->first();

        Account::find($row->cid)
        ->update([
            'church_name'=>$row->church_name,
            'location' => $row->location,
            'about' => $row->about,
            'description' => $row->description,
            'vision' => $row->vision,
            'mission' => $row->mission,
            'email' => $row->email,
            'mobile' => $row->mobile,
            'denomination_affiliation' => $row->denomination_affiliation,
            'church_type' => $row->church_type,
            'church_and_staff_leaders' => $row->church_and_staff_leaders,
            'telephone' => $row->telephone,
            'facebook_handle' => $row->facebook_handle,
            'twitter_handle' => $row->twitter_handle,
            'instagram_handle' => $row->instagram_handle,
            'linkedin_handle' => $row->linkedin_handle,
            'website_handle' => $row->website_handle,
            'status' => $row->status,
            'change_request_by' => $row->requestor." on ". $todayDate,
        ]);

        CrudController::update_request_status($row->id);

        $data = DB::table('accounts')
            ->where('id', $row->cid)
            ->first();
        /*$data = [
            'Info' => $row
        ];*/

        $audits = Account::find($row->cid)->audits;

        //return view('show.showaccount', $data);
        return view('show.showaccount', compact('audits','data'));
    }

    function update_request_status($id){
        $row = DB::table('account_requests')
            ->where('id', $id)
            ->first();
        
        AccountRequest::find($row->id)
        ->update([
            'request_status'=> "Approved",
        ]);
    }

    function disapprove_account_request($id){
        $row = DB::table('account_requests')
            ->where('id', $id)
            ->first();
        
        AccountRequest::find($row->id)
        ->update([
            'request_status'=> "Disapproved",
        ]);

        $data = DB::table('accounts')
            ->where('id', $row->cid)
            ->first();
        /*$data = [
            'Info' => $row
        ];*/

        $audits = Account::find($row->cid)->audits;

        //return view('show.showaccount', $data);
        return view('show.showaccount', compact('audits','data'));
    }


    function update_account(Request $request){

        $this->authorize('admin_only');

        $todayDate = Carbon::now()->toDateTimeString();

        /*$updating = DB::table('accounts')
            ->where('id', $request->input('cid'))
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
            ]);*/
            

            /*$update->([
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
            $update->save();*/

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


            /*$audit = DB::table('account_activities')
            ->insert([
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
                'status' => $request->input('Status'),
                'date_time' => $todayDate
            ]);*/

        return redirect('accountsbyname');
    }



    function send_request_account(Request $request){

        /*
        $todayDate = Carbon::now()->toDateTimeString();

            AccountRequest::find($request->input('cid'))
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
                'status' => $request->input('Status'),
                'request_status' => "Submitted"
            ]);

        return redirect('accountsbyname');
        */
        $accountrequest = new AccountRequest();
        //account details
        $accountrequest->church_name = request('ChurchName');
        $accountrequest->location = request('Location');
        $accountrequest->about = request('About');
        $accountrequest->description = request('Description');
        $accountrequest->vision = request('Vision');
        $accountrequest->mission = request('Mission');
        //contact details
        $accountrequest->email = request('Email');
        $accountrequest->mobile = request('MobileNo');
        $accountrequest->denomination_affiliation = request('DenomAffiliate');
        $accountrequest->church_type = request('ChurchType');
        $accountrequest->church_and_staff_leaders = request('StaffAndLeaders');
        $accountrequest->telephone = request('TelNo');
        $accountrequest->facebook_handle = request('SocialFB');
        $accountrequest->twitter_handle = request('SocialTwitter');
        $accountrequest->instagram_handle = request('SocialInstagram');
        $accountrequest->linkedin_handle = request('SocialLinkedIn');
        $accountrequest->website_handle = request('SocialWebsite');
        $accountrequest->status = request('Status');
        $accountrequest->request_status = "Submitted";
        $accountrequest->cid = request('cid');
        $accountrequest->requestor = request('requestor');
        $accountrequest->save();

        return redirect('accountrequestview');
    }


    function delete_account($id){
        $this->authorize('admin_only');
        Account::find($id)->delete();
        return redirect()->back();
    }
    //END ACCOUNT CRUD

    //MEMBER CRUD
    function show_member($id){
        $row = DB::table('members')
            ->where('id', $id)
            ->first();
        $data = [
            'Info' => $row
        ];
        return view('show.showmember', $data);
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
    //END USER CRUD 




    //SEARCH
    function search_account(){
        if(isset($_GET['inputSearch'])){
            $search_text = $_GET['inputSearch'];
            $data = Account::where('church_name', 'LIKE', '%'.$search_text.'%')
            ->orWhere('location', 'LIKE', '%'.$search_text.'%')
            ->orWhere('email', 'LIKE', '%'.$search_text.'%')
            ->orWhere('mobile', 'LIKE', '%'.$search_text.'%')
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
