@extends('layouts.app')

@section('content')
    <a href="{{url('account')}}" class="btn btn-secondary">New Account</a>
    <h1 class="pt-4">Accounts By Location</h1>
    <div class="table-responsive table-borderless">
        <table border="1" class="table table-striped table-bordered table-sm table-responsive" style="overflow-x: auto;">
            <tr>
                <td class="font-weight-bold">Location</td>
                <td class="font-weight-bold">Church Name</td>
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
                <th class="font-weight-bold text-dark"></th>
                <!--<td>Facebook</td>
                <td>Twitter</td>
                <td>Instagram</td>
                <td>LinkedIn</td>
                <td>Website</td>
                <td>Status</td>-->
            </tr>
            @foreach ($accounts as $account)
            <tr>
                <td><a href="showaccount/{{$account->id}}" class="text-primary">{{$account['location']}}</a></td>
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
                @can('admin_only')
                    <td><a onclick="return confirm('Are you sure you want to delete this account?')" href="deleteaccount/{{$account->id}}"><span title="Delete" class="fa fa-trash-alt mx-3"></span></a></td>
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
        {{$accounts->links()}}
    </span>

@endsection