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
use Illuminate\Support\Facades\File;

//use DB;

class CrudController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }



    //ACCOUNT CRUD//
    function create_account(Request $request){

        $this->validate($request, [
            'ChurchName' => 'required',
            'Location' => 'required',
            'Email' => 'nullable|email',
            'MobileNo' => 'required',
            'DenomAffiliate' => 'required',
            'ChurchType' => 'required',
            'StaffAndLeaders' => 'required',
            'Status' => 'required',
        ]);


        $account = new Account();
        //account details
        $account->church_name = request('ChurchName');
        $account->location = request('Location');
        $account->about = request('About');
        $account->description = request('Description');
        $account->vision = request('Vision');
        $account->mission = request('Mission');
        //contact details
        $account->email = request('Email');
        $account->mobile = request('MobileNo');
        $account->denomination_affiliation = request('DenomAffiliate');
        $account->church_type = request('ChurchType');
        $account->church_and_staff_leaders = request('StaffAndLeaders');
        $account->telephone = request('TelNo');
        $account->facebook_handle = request('SocialFB');
        $account->twitter_handle = request('SocialTwitter');
        $account->instagram_handle = request('SocialInstagram');
        $account->linkedin_handle = request('SocialLinkedIn');
        $account->website_handle = request('SocialWebsite');
        $account->status = request('Status');
        //create filename of account profile photo
        if(!empty($request->photo)){
            $imageName = request('FileName').'_'.time().'.'.$request->photo->extension();
            $account->church_photo = $imageName;
            $request->photo->move(public_path('images'), $imageName);
        }
        $account->save();

        return redirect('/accountsbyname');
    }

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


        $oldPhoto = $request->input('FileName_1');
        
        if(!empty($request->FileName)){
            File::delete(public_path('images').'/'.$oldPhoto);
            $imageName = request('FileName').'_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
        }
        else if(empty($request->FileName) && !empty($request->Delete)){
            File::delete(public_path('images').'/'.$oldPhoto);
            $imageName = null;
        }
        else if(empty($request->FileName) && empty($request->Delete)){
            $imageName = request('FileName_1').'_'.time().'.'.$request->photo->extension();
        }


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
            'status' => $request->input('Status'),
            'church_photo' => $imageName
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
    function create_member(Request $request){
        $member = new Member();
        //member details
        $member->church_name = request('ChurchName');
        $member->location = request('Location');
        $member->account_name = request('AcctName');
        $member->account_location = request('AcctLocation');
        $member->about = request('About');
        $member->description = request('Description');
        $member->vision = request('Vision');
        $member->mission = request('Mission');
        //contact details
        $member->email = request('Email');
        $member->mobile = request('MobileNo');
        $member->denomination_affiliation = request('DenomAffiliate');
        $member->church_type = request('ChurchType');
        $member->church_and_staff_leaders = request('StaffAndLeaders');
        $member->telephone = request('TelNo');
        $member->facebook_handle = request('SocialFB');
        $member->twitter_handle = request('SocialTwitter');
        $member->instagram_handle = request('SocialInstagram');
        $member->linkedin_handle = request('SocialLinkedIn');
        $member->website_handle = request('SocialWebsite');
        $member->status = request('Status');
        //create filename of member profile photo
        if(!empty($request->photo)){
            $imageName = request('FileName').'_'.time().'.'.$request->photo->extension();
            $member->church_photo = $imageName;
            $request->photo->move(public_path('images'), $imageName);
        }
        $member->save();
        return redirect('/membersbyname');
    }

    function show_member($id){
        $data = DB::table('members')
            ->where('id', $id)
            ->first();

        $audits = Member::find($id)->audits;
            
        return view('show.showmember', compact('audits','data'));
    }


    function update_member(Request $request){
        
        $this->authorize('admin_only');

        $oldPhoto = $request->input('FileName_1');
        
        if(!empty($request->FileName)){
            File::delete(public_path('images').'/'.$oldPhoto);
            $imageName = request('FileName').'_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
        }
        else if(empty($request->FileName) && !empty($request->Delete)){
            File::delete(public_path('images').'/'.$oldPhoto);
            $imageName = null;
        }
        else if(empty($request->FileName) && empty($request->Delete)){
            $imageName = request('FileName_1').'_'.time().'.'.$request->photo->extension();
        }

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
                'status' => $request->input('Status'),
                'church_photo' => $imageName
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
