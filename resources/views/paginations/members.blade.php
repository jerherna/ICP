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
                <th class="font-weight-bold">Church Name</th>
                <th class="font-weight-bold">Location</th>
                <!--<td>About</td>
                <td>Description</td>
                <td>Vision</td>
                <td>Mission</td>
                -->
                <th class="font-weight-bold">Email</th>
                <th class="font-weight-bold">Mobile No.</th>
                <th class="font-weight-bold">Denomination Affiliation</th>
                <th class="font-weight-bold">Church Type</th>
                <th class="font-weight-bold">Church and Staff Leaders</th>
                <th class="font-weight-bold">Telephone No.</th>
                <th class="font-weight-bold text-dark"></th>
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
                @can('admin_only')
                    <td><a onclick="return confirm('Are you sure you want to delete this member?')" href="deletemember/{{$member->id}}"><span title="Delete" class="fa fa-trash-alt mx-3"></span></a></td>
                @endcan
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