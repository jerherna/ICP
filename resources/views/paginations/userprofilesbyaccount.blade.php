@extends('layouts.app')

@section('content')
    <a href="{{url('userprofile')}}" class="btn btn-primary">New User</a>
    <h1>User List</h1>
    <div class="py-5">
        <table border="1" class="py-5 table table-striped table-bordered table-sm">
            <tr>
                <td class="font-weight-bold">Account</td>
                <td class="font-weight-bold">Last Name</td>
                <td class="font-weight-bold">First Name</td>
                <!--<td>About</td>
                <td>Description</td>
                <td>Vision</td>
                <td>Mission</td>
                -->
                <td class="font-weight-bold">Middle Name</td>
                <td class="font-weight-bold">Account Name</td>
                <td class="font-weight-bold">Organization Name</td>
                <!--<td>Facebook</td>
                <td>Twitter</td>
                <td>Instagram</td>
                <td>LinkedIn</td>
                <td>Website</td>
                <td>Status</td>-->
            </tr>
            @foreach ($userprofiles as $userprofile)
            <tr>
                <td><a href="showmember/{{$userprofile->id}}" class="text-primary">{{$userprofile['account_name']}}</a></td>
                <td>{{$userprofile['lastname']}}</td>
                <td>{{$userprofile['firstname']}}</td>
                <!--<td>About</td>
                <td>Description</td>
                <td>Vision</td>
                <td>Mission</td>
                -->
                <td>{{$userprofile['middlename']}}</td>
                <td>{{$userprofile['account_name']}}</td>
                <td>{{$userprofile['org_name']}}</td>
                <!--<td>Facebook</td>
                <td>Twitter</td>
                <td>Instagram</td>
                <td>LinkedIn</td>
                <td>Website</td>
                <td>Status</td>-->
            </tr>
            @endforeach
        </table>
    </div>
    

    <span>
        {{$userprofiles->links()}}
    </span>

@endsection