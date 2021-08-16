@extends('layouts.app')

@section('content')
    <h1 class="pt-4 align-items-center">Admin Users View</h1>
    <!--<div class="row float-right pb-3 mx-auto">
        <form method="get" action="/searchuser">
            <label>Search:</label>
            <input id="inputSearch" type="" class="form-control" name="inputSearch">
            <div class="pt-2">
                <button type="submit" class="btn btn-secondary my-2 my-sm-0 float-right">Search</button>
            </div>
        </form>
    </div>-->
    <div class="table-responsive table-borderless">
        <table border="1" class="py-5 table table-striped table-bordered table-bordered table-sm">
            <tr>
                <td class="font-weight-bold">Name</td>
                <td class="font-weight-bold">Admin Rights</td>
                <td class="font-weight-bold">Set Admin Status</td>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{$user['name']}}</td>
                <td>@if ($user['is_admin'] == true) Yes @else No @endif</td>
                @if($user['is_admin'] == false)
                    <td><a onclick="return confirm('Are you sure you want to set this user as admin?')" href="setadmin/{{$user->id}}" class="btn btn-primary">Set As Admin</a></td>
                @else
                    <td><a onclick="return confirm('Are you sure you want to remove this user as admin?')" href="removeadmin/{{$user->id}}" class="btn btn-warning">Remove As Admin</a></td>
                @endif
                
            </tr>
            @endforeach
        </table>
    </div>
    

    <span>
        {{$users->links()}}
    </span>

@endsection