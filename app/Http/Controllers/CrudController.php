<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Member;
use App\Models\Userprofile;
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
    


    function edit_account($id){
        $row = DB::table('accounts')
            ->where('id', $id)
            ->first();
        $data = [
            'Info' => $row
        ];

        return view('edit.editaccount', $data);
    }



    function update_account(Request $request){

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
        $row = DB::table('members')
            ->where('id', $id)
            ->first();
        $data = [
            'Info' => $row
        ];
        return view('edit.editmember', $data);
    }



    function delete_member($id){
        Member::find($id)->delete();
        return redirect('membersbylocation');
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
}
