@extends('layouts.app')

@section('content')
    <h1 class="pt-4 align-items-center">Members Change Request</h1>
    <!--
    <div class="row float-right pb-3 mx-auto">
        <form method="get" action="/searchaccount">
            <label>Search:</label>
            <input id="inputSearch" type="" class="form-control" name="inputSearch">
            <div class="pt-2">
                <button type="submit" class="btn btn-secondary my-2 my-sm-0 float-right">Search</button>
            </div>
        </form>
    </div>
    -->
    <div class="table-responsive table-borderless">
        <table border="1" class="table table-striped table-bordered table-sm table-responsive" style="overflow-x: auto;">
            <tr>
                <td class="font-weight-bold">Requestor</td>
                <td class="font-weight-bold">Church Name</td>
                <td class="font-weight-bold">Location</td>
                <td class="font-weight-bold">Request Status</td>
                <!--<td>About</td>
                <td>Description</td>
                <td>Vision</td>
                <td>Mission</td>
                -->
                <!--<td>Facebook</td>
                <td>Twitter</td>
                <td>Instagram</td>
                <td>LinkedIn</td>
                <td>Website</td>
                <td>Status</td>-->
            </tr>
            @foreach ($member_requests as $member)
            <tr>
                <td><a href="reviewrequestmember/{{$member->id}}" class="text-primary">{{$member['requestor']}}</a></td>
                <td>{{$member['church_name']}}</td>
                <td>{{$member['location']}}</td>
                <td>{{$member['request_status']}}</td>
                <!--<td>About</td>
                <td>Description</td>
                <td>Vision</td>
                <td>Mission</td>
                -->
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
        {{$member_requests->links()}}
    </span>

@endsection