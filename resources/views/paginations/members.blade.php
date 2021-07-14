@extends('layouts.app')

@section('content')
    <a href="{{url('member')}}" class="btn btn-secondary">New Member</a>
    <h1 class="pt-4 align-items-center">Members by Name</h1>
    <div class="row float-right pb-3 mx-auto">
        <form method="get" action="/searchmember">
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
            @foreach ($members as $member)
            <tr>
                <td><a href="showmember/{{$member->id}}" class="text-primary">{{$member['church_name']}}</a></td>
                <td>{{$member['location']}}</td>
                <!--<td>About</td>
                <td>Description</td>
                <td>Vision</td>
                <td>Mission</td>
                -->
                <td>{{$member['email']}}</td>
                <td>{{$member['mobile']}}</td>
                <td>{{$member['denomination_affiliation']}}</td>
                <td>{{$member['church_type']}}</td>
                <td>{{$member['church_staff_and_leaders']}}</td>
                <td>{{$member['telephone']}}</td>
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
        {{$members->links()}}
    </span>

@endsection