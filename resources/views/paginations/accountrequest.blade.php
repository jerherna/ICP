@extends('layouts.app')

@section('content')
    <h1 class="pt-4 align-items-center">Accounts Change Request</h1>
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
            @foreach ($account_requests as $account)
            <tr>
                <td><a href="reviewrequestaccount/{{$account->id}}" class="text-primary">{{$account['requestor']}}</a></td>
                <td>{{$account['church_name']}}</td>
                <td>{{$account['location']}}</td>
                <td>{{$account['request_status']}}</td>
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
        {{$account_requests->links()}}
    </span>

@endsection