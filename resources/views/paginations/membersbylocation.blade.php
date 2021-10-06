@extends('layouts.app')

@section('content')
    <a href="{{url('member')}}" class="btn btn-primary">New Member</a>
    <h1 class="pt-4 align-items-center">Members by Location</h1>
    <div class="row float-right pb-3 mx-auto">
        <label>Search:</label>
        <input id="inputSearch" type="" class="form-control" name="inputSearch">
    </div>
    <div class="table-responsive table-borderless">
        <table border="1" class="table table-striped table-bordered table-sm table-responsive" style="overflow-x: auto;">
            <thead>
                <tr>
                    <th class="font-weight-bold text-dark">Location</th>
                    <th class="font-weight-bold text-dark">Church Name</th>
                    <th class="font-weight-bold text-dark">Email</th>
                    <th class="font-weight-bold text-dark">Mobile No.</th>
                    <th class="font-weight-bold text-dark">Denomination Affiliation</th>
                    <th class="font-weight-bold text-dark">Church Type</th>
                    <th class="font-weight-bold text-dark">Church and Staff Leaders</th>
                    <th class="font-weight-bold text-dark">Telephone No.</th>
                    <th class="font-weight-bold text-dark"></th>
                </tr>
            </thead>
            
            @foreach ($members as $member)
            <tr>
                <td><a href="showmember/{{$member->id}}" class="text-primary">{{$member['location']}}</a></td>
                <td>{{$member['church_name']}}</td>
                <td>{{$member['email']}}</td>
                <td>{{$member['mobile']}}</td>
                <td>{{$member['denomination_affiliation']}}</td>
                <td>{{$member['church_type']}}</td>
                <td>{{$member['church_staff_and_leaders']}}</td>
                <td>{{$member['telephone']}}</td>
                @can('admin_only')
                    <td><a onclick="return confirm('Are you sure you want to delete this member?')" href="deletemember/{{$member->id}}"><span title="Delete" class="fa fa-trash-alt mx-3"></span></a></td>
                @endcan
            </tr>
            @endforeach
        </table>
    </div>
    

    <span>
        {{$members->links()}}
    </span>

@endsection