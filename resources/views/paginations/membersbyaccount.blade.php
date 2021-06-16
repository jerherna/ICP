@extends('layouts.app')

@section('content')
    <a href="{{url('member')}}" class="btn btn-primary">New Member</a>
    <h1>Member List</h1>
    <div class="py-5 mx-auto">
        <table border="1" class="py-5 table table-striped table-bordered table-sm">
            <tr>
                <td>Account Name</td>
                <td>Church Name</td>
                <td>Location</td>
                <!--<td>About</td>
                <td>Description</td>
                <td>Vision</td>
                <td>Mission</td>
                -->
                <td>Email</td>
                <td>Mobile No.</td>
                <td>Denomination Affiliation</td>
                <td>Church Type</td>
                <td>Church and Staff Leaders</td>
                <td>Telephone No.</td>
                <!--<td>Facebook</td>
                <td>Twitter</td>
                <td>Instagram</td>
                <td>LinkedIn</td>
                <td>Website</td>
                <td>Status</td>-->
            </tr>
            @foreach ($members as $member)
            <tr>
                <td>{{$member['account_name']}}</td>
                <td>{{$member['church_name']}}</td>
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