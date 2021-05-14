@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h6><i class="pr-2 fa fa-sitemap"></i>Accounts</h6>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="ik ik-chevron-left action-toggle"></i></li>
                        <li><i class="ik ik-minus minimize-card"></i></li>
                        <li><i class="ik ik-x close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body link scrollable" style="height:360px;">
                <ul class="list-group accounts">
                    <!-- content is dynamically populated -->
                </ul>
                <div class="alert alert-info" role="alert">
                    No accounts defined!
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="row">
            <!-- Member Count -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body px-1 py-1">
                        <div class="border">
                            <div class="w-100 bg-warning d-flex justify-content-between text-white mb-0 px-2 pt-2">
                                <h4><i class="fa fa-th-list pt-1"></i></h4>
                                <h4></h4>
                            </div>
                            <div class="cw-100 bg-warning d-flex justify-content-end text-white mb-0 px-2">
                                <h6>Current Member<br>Count</h6>
                            </div>
                            <div class="w-100 d-flex justify-content-between text-dark">
                                <a class="btn btn-link member-display" href="#">
                                    View Details
                                </a>
                                <a class="btn btn-link member-display" href="#">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Count -->
            <div class="col-sm-6" >
                <div class="card">
                    <div class="card-body px-1 py-1">
                        <div class="border">
                            <div class="w-100 bg-info d-flex justify-content-between text-white mb-0 px-2 pt-2">
                                <h4><i class="fa fa-th-list pt-1"></i></h4>
                                <h4></h4>
                            </div>
                            <div class="cw-100 bg-info d-flex justify-content-end text-white mb-0 px-2">
                                <h6>Current User<br>Count</h6>
                            </div>
                            <div class="w-100 d-flex justify-content-between text-dark">
                                <a class="btn btn-link user-display" href="#">
                                    View Details
                                </a>
                                <a class="btn btn-link user-display" href="#">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h6 class="preview-title text-secondary text-uppercase py-5">PREVIEW</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ul class="list-group preview">
                    <!-- content is dynamically populated -->
                </ul>
            </div>
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