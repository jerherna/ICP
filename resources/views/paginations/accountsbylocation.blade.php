@extends('layouts.app')

@section('content')
    <a href="{{url('account')}}" class="btn btn-primary">New Account</a>
    <!--<button type="button" class="btn btn-primary float-right" href="{{url('account')}}">New Account</button>-->
    <h1>Account List</h1>
    <div class="py-5">
        <table border="1" class="py-5 table table-striped table-bordered table-sm">
            <tr>
                <td>Location</td>
                <td>Church Name</td>
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
            @foreach ($accounts as $account)
            <tr>
                <td>{{$account['location']}}</td>
                <td>{{$account['church_name']}}</td>
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