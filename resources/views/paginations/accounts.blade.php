@extends('layouts.app')

@section('content')
    <a href="{{url('account')}}" class="btn btn-secondary">New Account</a>
    <h1 class="pt-4 align-items-center">Accounts By Name</h1>
    <div class="row float-right pb-3 mx-auto">
        <form method="get" action="/searchaccount">
            <label>Search:</label>
            <input id="inputSearch" type="" class="form-control" name="inputSearch">
            <div class="pt-2">
                <button type="submit" class="btn btn-secondary my-2 my-sm-0 float-right">Search</button>
            </div>
        </form>
    </div>
    <div class="table-responsive table-borderless">
        <table border="1" class="table table-striped table-bordered table-sm table-responsive" style="overflow-x: auto;">
            <tr>
                <td class="font-weight-bold">Church Name</td>
                <td class="font-weight-bold">Location</td>
                <!--<td>About</td>
                <td>Description</td>
                <td>Vision</td>
                <td>Mission</td>
                -->
                <td class="font-weight-bold">Email</td>
                <td class="font-weight-bold">Mobile No.</td>
                <td class="font-weight-bold">Denomination Affiliation</td>
                <td class="font-weight-bold">Church Type</td>
                <td class="font-weight-bold">Church and Staff Leaders</td>
                <td class="font-weight-bold">Telephone No.</td>
                <!--<td>Facebook</td>
                <td>Twitter</td>
                <td>Instagram</td>
                <td>LinkedIn</td>
                <td>Website</td>
                <td>Status</td>-->
            </tr>
            @foreach ($accounts as $account)
            <tr>
                <td><a href="showaccount/{{$account->id}}" class="text-primary">{{$account['church_name']}}</a></td>
                <td>{{$account['location']}}</td>
                <!--<td>About</td>
                <td>Description</td>
                <td>Vision</td>
                <td>Mission</td>
                -->
                <td>{{$account['email']}}</td>
                <td>{{$account['mobile']}}</td>
                <td>{{$account['denomination_affiliation']}}</td>
                <td>{{$account['church_type']}}</td>
                <td>{{$account['church_staff_and_leaders']}}</td>
                <td>{{$account['telephone']}}</td>
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
        {{$accounts->links()}}
    </span>

@endsection