@extends('layouts.app')

@section('content')
@can('admin_only')
<div class="row">
    <div class="col-md-12">
        <div class="row mb-5">

            <!-- Account Count -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body px-1 py-1">
                        <div class="border">
                            <div class="w-100 bg-primary d-flex justify-content-between text-white mb-0 px-2 pt-2">
                                <h4><i class="fa fa-th-list pt-1"></i></h4>
                                <h4>{{$accounts->count()}}</h4>
                            </div>
                            <div class="cw-100 bg-primary d-flex justify-content-end text-white mb-0 px-2">
                                <h6>Current Account<br>Count</h6>
                            </div>
                            <div class="w-100 d-flex justify-content-between text-dark">
                                <a class="btn btn-link member-display" href="/accountsbyname">
                                    View Details
                                </a>
                                <a class="btn btn-link member-display" href="/accountsbyname">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Member Count -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body px-1 py-1">
                        <div class="border">
                            <div class="w-100 bg-warning d-flex justify-content-between text-white mb-0 px-2 pt-2">
                                <h4><i class="fa fa-th-list pt-1"></i></h4>
                                <h4>{{$members->count()}}</h4>
                            </div>
                            <div class="cw-100 bg-warning d-flex justify-content-end text-white mb-0 px-2">
                                <h6>Current Member<br>Count</h6>
                            </div>
                            <div class="w-100 d-flex justify-content-between text-dark">
                                <a class="btn btn-link member-display" href="/membersbyname">
                                    View Details
                                </a>
                                <a class="btn btn-link member-display" href="/membersbyname">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Count -->
            <div class="col-sm-4" >
                <div class="card">
                    <div class="card-body px-1 py-1">
                        <div class="border">
                            <div class="w-100 bg-info d-flex justify-content-between text-white mb-0 px-2 pt-2">
                                <h4><i class="fa fa-th-list pt-1"></i></h4>
                                <h4>{{$users->count()}}</h4>
                            </div>
                            <div class="cw-100 bg-info d-flex justify-content-end text-white mb-0 px-2">
                                <h6>Current User<br>Count</h6>
                            </div>
                            <div class="w-100 d-flex justify-content-between text-dark">
                                <a class="btn btn-link user-display" href="/usersbyname">
                                    View Details
                                </a>
                                <a class="btn btn-link user-display" href="/usersbyname">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endcan

<div class="row">
    <div class="col-md-12">
        <h3>Member Locations</h3>
        <div class="map" id="app">
            <!-- MEMBER MAP TEST GOES HERE -->
            <gmap-map
                :center="mapCenter"
                :zoom="12"
                style="width: 100%; height: 500px;"
                
            >
                <gmap-info-window
                    :options="infoWindowOptions"
                    :position="infoWindowPosition"
                    :opened="infoWindowOpened"
                    @closeclick="handleInfoWindowClose"
                >
                    <div>
                        <h5 v-text="activeMember.church_name">Test Member</h5>
                        <p v-text="activeMember.location">Address Goes Here</p>
                    </div>
                </gmap-info-window>
                <gmap-marker
                    v-for="(m, index) in members"
                    :key="m.id"
                    :position="getPosition(m)"
                    :clickable="true"
                    :draggable="false"
                    @click="handleMarkerClicked(m)"
                ></gmap-marker>
            </gmap-map>
        </div>
    </div>
    
</div>

<div class="row" hidden>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h6><i class="pr-2 fas fa-calendar"></i>Calendar</h6>
                <div class="card-header-right d-flex justify-content-end">
                    <div class="dropdwn pt-1">
                        <a  type="text" id="googleAuthorization" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <small class="mb-1"><i class="pl-3 fa fa-ellipsis-v"></i></small>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="googleAuthorization">
                            <a class="dropdown-item authorize_button" href="#" style="display: none;">
                                <i class="text-danger fab fa-google"></i> Google Sign In
                            </a>
                            <a class="dropdown-item signout_button" href="#" style="display: none;">
                                <i class="text-danger fab fa-google"></i> Sign Out Google
                            </a>
                        </div>
                    </div>
                    <ul class="list-unstyled card-option">
                        <li><i class="ik ik-chevron-left action-toggle"></i></li>
                        <li><i class="ik ik-minus minimize-card"></i></li>
                        <li><i class="ik ik-x close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div id="calendar"></div>
                <!-- content is dynamically populated -->
            </div>
        </div>
    </div>





    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h6><i class="pr-2 fas fa-gift"></i>Birthdays This Month</h6>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="ik ik-chevron-left action-toggle"></i></li>
                        <li><i class="ik ik-minus minimize-card"></i></li>
                        <li><i class="ik ik-x close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body birthdays scrollable h-100">
                <ul class="list-group">
                    <!-- content is dynamically populated -->
                </ul>
                <div class="alert alert-info" role="alert">
                    No upcoming birthdays for this month.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection