<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Member;
use App\Models\Userprofile;
use App\Models\AccountRequest;
use App\Models\MemberRequest;
use App\Models\User;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChangeRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //ACCOUNT REQUEST FUNCTIONS


    function change_request_account($id){
        $row = DB::table('accounts')
            ->where('id', $id)
            ->first();
        $data = [
            'Info' => $row
        ];

        return view('request.requestaccount', $data);
    }


    function review_request_account($id){
        $data = DB::table('account_requests')
            ->where('id', $id)
            ->first();

        $audits = AccountRequest::find($id)->audits;

        return view('show.showrequestaccount', compact('audits', 'data'));
    }


    function send_request_account(Request $request){
        $accountrequest = new AccountRequest();
        //account details
        $accountrequest->church_name = request('ChurchName_1');
        $accountrequest->location = request('Location_1');
        $accountrequest->about = request('About_1');
        $accountrequest->description = request('Description_1');
        $accountrequest->vision = request('Vision_1');
        $accountrequest->mission = request('Mission_1');
        //contact details
        $accountrequest->email = request('Email_1');
        $accountrequest->mobile = request('MobileNo_1');
        $accountrequest->denomination_affiliation = request('DenomAffiliate_1');
        $accountrequest->church_type = request('ChurchType_1');
        $accountrequest->church_and_staff_leaders = request('StaffAndLeaders_1');
        $accountrequest->telephone = request('TelNo_1');
        $accountrequest->facebook_handle = request('SocialFB_1');
        $accountrequest->twitter_handle = request('SocialTwitter_1');
        $accountrequest->instagram_handle = request('SocialInstagram_1');
        $accountrequest->linkedin_handle = request('SocialLinkedIn_1');
        $accountrequest->website_handle = request('SocialWebsite_1');
        $accountrequest->status = request('Status_1');
        $accountrequest->request_status = "Submitted";
        $accountrequest->cid = request('cid');
        $accountrequest->requestor = request('requestor');
        $accountrequest->save();

        $created_id = $accountrequest->id;

        AccountRequest::find($created_id)
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

        return redirect('accountrequestview');
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

        ChangeRequestController::update_account_request_status($row->id);

        $data = DB::table('accounts')
            ->where('id', $row->cid)
            ->first();

        $audits = Account::find($row->cid)->audits;

        return view('show.showaccount', compact('audits','data'));
    }


    function update_account_request_status($id){
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

        $audits = Account::find($row->cid)->audits;

        //return view('show.showaccount', $data);
        return view('show.showaccount', compact('audits','data'));
    }


    //END OF ACCOUNT REQUEST FUNCTIONS





    //MEMBER REQUEST FUNCTIONS


    function change_request_member($id){
        $row = DB::table('members')
            ->where('id', $id)
            ->first();
        $data = [
            'Info' => $row
        ];

        return view('request.requestmember', $data);
    }


    function review_request_member($id){
        $data = DB::table('member_requests')
            ->where('id', $id)
            ->first();

        $audits = MemberRequest::find($id)->audits;
        return view('show.showrequestmember', compact('audits', 'data'));
    }


    function send_request_member(Request $request){
        $memberrequest = new MemberRequest();
        //member details
        $memberrequest->church_name = request('ChurchName_1');
        $memberrequest->location = request('Location_1');
        $memberrequest->about = request('About_1');
        $memberrequest->description = request('Description_1');
        $memberrequest->vision = request('Vision_1');
        $memberrequest->mission = request('Mission_1');
        $memberrequest->account_name = request('AcctName_1');
        $memberrequest->account_location = request('AcctLocation_1');
        //contact details
        $memberrequest->email = request('Email_1');
        $memberrequest->mobile = request('MobileNo_1');
        $memberrequest->denomination_affiliation = request('DenomAffiliate_1');
        $memberrequest->church_type = request('ChurchType_1');
        $memberrequest->church_and_staff_leaders = request('StaffAndLeaders_1');
        $memberrequest->latitude = request('Latitude_1');
        $memberrequest->longitude = request('Longitude_1');
        $memberrequest->telephone = request('TelNo_1');
        $memberrequest->facebook_handle = request('SocialFB_1');
        $memberrequest->twitter_handle = request('SocialTwitter_1');
        $memberrequest->instagram_handle = request('SocialInstagram_1');
        $memberrequest->linkedin_handle = request('SocialLinkedIn_1');
        $memberrequest->website_handle = request('SocialWebsite_1');
        $memberrequest->status = request('Status_1');
        $memberrequest->request_status = "Submitted";
        $memberrequest->cid = request('cid');
        $memberrequest->requestor = request('requestor');
        $memberrequest->save();

        $created_id = $memberrequest->id;

        MemberRequest::find($created_id)
            ->update([
                'church_name'=>$request->input('ChurchName'),
                'location' => $request->input('Location'),
                'about' => $request->input('About'),
                'description' => $request->input('Description'),
                'vision' => $request->input('Vision'),
                'mission' => $request->input('Mission'),
                'account_name' => $request->input('AcctName'),
                'account_location' => $request->input('AcctLocation'),
                'email' => $request->input('Email'),
                'mobile' => $request->input('MobileNo'),
                'denomination_affiliation' => $request->input('DenomAffiliate'),
                'church_type' => $request->input('ChurchType'),
                'church_and_staff_leaders' => $request->input('StaffAndLeaders'),
                'latitude' => $request->input('Latitude'),
                'longitude' => $request->input('Longitude'),
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


    function approve_member_change($id){
        $todayDate = Carbon::now()->toDateTimeString();

        $row = DB::table('member_requests')
            ->where('id', $id)
            ->first();

        Member::find($row->cid)
        ->update([
            'church_name'=>$row->church_name,
            'location' => $row->location,
            'account_name' => $row->account_name,
            'account_location' => $row->account_location,
            'about' => $row->about,
            'description' => $row->description,
            'vision' => $row->vision,
            'mission' => $row->mission,
            'email' => $row->email,
            'mobile' => $row->mobile,
            'denomination_affiliation' => $row->denomination_affiliation,
            'church_type' => $row->church_type,
            'church_and_staff_leaders' => $row->church_and_staff_leaders,
            'latitude' => $row->latitude,
            'longitude' => $row->longitude,
            'telephone' => $row->telephone,
            'facebook_handle' => $row->facebook_handle,
            'twitter_handle' => $row->twitter_handle,
            'instagram_handle' => $row->instagram_handle,
            'linkedin_handle' => $row->linkedin_handle,
            'website_handle' => $row->website_handle,
            'status' => $row->status,
            'change_request_by' => $row->requestor." on ". $todayDate,
        ]);

        ChangeRequestController::update_member_request_status($row->id);

        $data = DB::table('members')
            ->where('id', $row->cid)
            ->first();

        $audits = Member::find($row->cid)->audits;

        return view('show.showmember', compact('audits','data'));
    }


    function update_member_request_status($id){
        $row = DB::table('member_requests')
            ->where('id', $id)
            ->first();
        
        MemberRequest::find($row->id)
        ->update([
            'request_status'=> "Approved",
        ]);
    }
    

    function disapprove_member_request($id){
        $row = DB::table('member_requests')
            ->where('id', $id)
            ->first();
        
        MemberRequest::find($row->id)
        ->update([
            'request_status'=> "Disapproved",
        ]);

        $data = DB::table('members')
            ->where('id', $row->cid)
            ->first();

        $audits = Member::find($row->cid)->audits;

        return view('show.showmember', compact('audits','data'));
    }


    //END OF MEMBER REQUEST FUNCTIONS

}
