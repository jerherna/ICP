@extends('layouts.app')

@section('content')
    <a href="{{url('userprofile')}}" class="btn btn-secondary">New User</a>
    <h1 class="pt-4 align-items-center">Users By Name</h1>
    <div class="row float-right pb-3 mx-auto">
        <form method="get" action="/searchuser">
            <label>Search:</label>
            <input id="inputSearch" type="" class="form-control" name="inputSearch">
            <div class="pt-2">
                <button type="submit" class="btn btn-secondary my-2 my-sm-0 float-right">Search</button>
            </div>
        </form>
    </div>
    <div class="table-responsive table-borderless">
        <table border="1" class="py-5 table table-striped table-bordered table-bordered table-sm">
            <tr>
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
                <td><a href="showmember/{{$userprofile->id}}" class="text-primary">{{$userprofile['lastname']}}</a></td>
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