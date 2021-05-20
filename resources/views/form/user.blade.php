@extends('layouts.app')

@section('content')
<div class="page-header">
	<div class="row flex-column-reverse flex-lg-row">
		<div class="col-lg-4 col-sm-12">
			<div class="page-header-title">
				<i class="ik ik-file-text bg-blue"></i>
				
				<div class="d-inline">
					<h5>User Profile</h5>
					<span>New User Profile</span>
				</div>
			</div>
		</div>
		<!-- // Action Buttons for NOTES VERSION -->
		<!--<div class="col-lg-8 col-sm-12 mb-4 d-none d-md-flex justify-content-end">
			<div class="custom-actionbar ">
		-->
				<!-- Custom action button for large screens -->
		<!--
			</div>
		</div>
		<div class="col-lg-8 col-sm-12 text-right mb-4 d-md-none">
		-->
			<!-- Custom action button for mobile -->
		<!--
			<div class="dropdown">
		 		<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle " data-toggle="dropdown" id="action-buttons" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-ellipsis-v"></i> Actions
				</button>
				<div class="custom-actionbar dropdown-menu" aria-labelledby="action-buttons" x-placement="bottom-start">
				</div>
			</div>
		</div>
		-->
		<!-- // END Action Buttons for NOTES VERSION -->
	</div>
</div>


<!-- hidden remove attachment checkbox -->
<!--<div class="row" hidden>
	<div class="col-sm-12">
		<Computed Value>
	</div>
</div>-->

<form>
	<!-- USER PROFILE -->
	<div class = "row">
        <div class="col-sm-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h6>Personal Information</h6>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option" style="width: 90px;">
                             <li><i class="ik ik-chevron-left action-toggle ik-chevron-right"></i></li>
                            <li><i class="ik minimize-card ik-minus"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4 h-100">
                        <div class="col-sm-4 ml-auto">
                            <div class="d-flex justify-content-center">
                                <div class="show-image">
                                       
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">First Name</label>
                                <div class="col-sm-8">
                                    <input name="FirstName" value="" data-cus-label="First Name" data-value="" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Middle Name</label>
                                <div class="col-sm-8">
                                    <input name="MiddleName" value="" data-cus-label="Middle Name" data-value="" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Last Name</label>
                                <div class="col-sm-8">
                                    <input name="LastName" value="" data-cus-label="Last Name" data-value="" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Role</label>
                                <div class="col-sm-8">
                                    <input name="Role" value="" data-cus-label="Role" data-value="" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </div>
    
    
    
                    <br>
                    <h6><small>Church Details</small></h6>
                    <hr class="mt-1" />
                    <div class="form-row">
                        <div class="col-sm-6 no-gutters">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Account Name</label>
                                <div class="col-sm-8">
                                    <input name="AcctName" data-cus-label="Account Name" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Account Location</label>
                                <div class="col-sm-8">
                                    <input name="AcctLocation" data-cus-label="Account Location" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
    
                        <div class="col-sm-6 no-gutters">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Organization</label>
                                <div class="col-sm-8">
                                    <input name="Org" data-cus-label="Organization" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Organization Location</label>
                                <div class="col-sm-8">
                                    <input name="OrgLocation" data-cus-label="Organization Location" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
	<!-- USER PROFILE -->

	<!--CONTACT DETAILS-->
	<div class = "row">
		<div class="col-sm-12">
			<div class="card mb-3">
				<div class="card-header">
					<h6>Contact Details</h6>
					<div class="card-header-right">
						<ul class="list-unstyled card-option" style="width: 90px;">
							<li><i class="ik ik-chevron-left action-toggle ik-chevron-right"></i></li>
							<li><i class="ik minimize-card ik-minus"></i></li>
							<li><i class="ik ik-x close-card"></i></li>
						</ul>
					</div>
				</div>
				<div class="card-body">
					<div class="form-row">
						<div class="col-sm-6 no-gutters">

							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Email</label>
								<div class="col-sm-8">
									<input name="Email" value="" data-cus-label="Email" data-value="" class="form-control form-control-sm">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Mobile No.</label>
								<div class="col-sm-8">
									<input name="MobileNo" value="" data-cus-label="Mobile No." size="35" data-value="" class="form-control form-control-sm">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Denomination Affilitation</label>
								<div class="col-sm-8">
									<input name="DenomAffiliate" value="" data-cus-label="Denomination Affiliation" data-value="" class="form-control form-control-sm">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Church Type</label>
								<div class="col-sm-8">
									<input name="ChurchType" value="" data-cus-label="Church Type" data-value="" class="form-control form-control-sm">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Church and Staff Leaders</label>
								<div class="col-sm-8">
									<input name="StaffAndLeaders" value="" data-cus-label="Staff and Leaders" data-value="" class="form-control form-control-sm">
								</div>
							</div>



						</div>
						<div class="col-sm-6 no-gutters">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Telephone No.</label>
								<div class="col-sm-8">
									<input name="TelNo" value="" data-cus-label="Telephone No." size="35" data-value="" class="form-control form-control-sm">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label"><i class="fab fa-facebook-square"></i> Facebook</label>
								<div class="col-sm-1" style="padding-top:7px; padding-bottom:7px;"><input type="checkbox" id="social-fb" name="social-fb" value="Facebook" class="fb-checkbox"></div>
								<div class="fb-value col-sm-8">
									<input name="SocialFB" value="" data-cus-label="Facebook Profile" data-value="" class="form-control form-control-sm">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label"><i class="fab fa-twitter-square"></i> Twitter</label>
								<div class="col-sm-1" style="padding-top:7px; padding-bottom:7px;"><input type="checkbox" id="social-tw" name="social-tw" value="Twitter" class="tw-checkbox"></div>
								<div class="tw-value col-sm-8">
									<input name="SocialTwitter" value="" data-cus-label="Twitter Profile" data-value="" class="form-control form-control-sm">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label"><i class="fab fa-instagram"></i> Instagram</label>
								<div class="col-sm-1" style="padding-top:7px; padding-bottom:7px;"><input type="checkbox" id="social-ig" name="social-ig" value="Instagram" class="ig-checkbox"></div>
								<div class="ig-value col-sm-8">
									<input name="SocialInstagram" value="" data-cus-label="Instagram Profile" data-value="" class="form-control form-control-sm">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label"><i class="fab fa-linkedin"></i> LinkedIn</label>
								<div class="col-sm-1" style="padding-top:7px; padding-bottom:7px;"><input type="checkbox" id="social-li" name="social-li" value="LinkedIn" class="li-checkbox"></div>
								<div class="li-value col-sm-8">
									<input name="SocialLinkedIn" value="" data-cus-label="LinkedIn Profile" data-value="" class="form-control form-control-sm">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label"><i class="fas fa-globe"></i> Website</label>
								<div class="col-sm-1" style="padding-top:7px; padding-bottom:7px;"><input type="checkbox" id="social-web" name="social-web" value="Website" class="web-checkbox"></div>
								<div class="web-value col-sm-8">
									<input name="SocialWebsite" value="" data-cus-label="Website Link" data-value="" class="form-control form-control-sm">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Status</label>
								<div class="col-sm-8"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--//CONTACT DETAILS-->

    <!--SKILLS-->
    <div class = "row">
        <div class="col-sm-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h6>Skills</h6>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option" style="width: 90px;">
                            <li><i class="ik ik-chevron-left action-toggle ik-chevron-right"></i></li>
                            <li><i class="ik minimize-card ik-minus"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row align-items-center">
                        <div class="col font-weight-bold bg-light py-2">Skills</div>
                        <div class="col font-weight-bold bg-light py-2">Rate</div>
                        <div class="col font-weight-bold bg-light py-2">Years of Experience</div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col"><input name="SSkills_1" class="form-control form-control-sm"></div>
                        <div class="col"><input name="SRate_1" class="form-control form-control-sm"></div>
                        <div class="col"><<input name="SRate_1" class="form-control form-control-sm"></div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col"><input name="SSkills_2" class="form-control form-control-sm"></div>
                        <div class="col"><input name="SRate_2" class="form-control form-control-sm"></div>
                        <div class="col"><<input name="SRate_2" class="form-control form-control-sm"></div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col"><input name="SSkills_3" class="form-control form-control-sm"></div>
                        <div class="col"><input name="SRate_3" class="form-control form-control-sm"></div>
                        <div class="col"><<input name="SRate_3" class="form-control form-control-sm"></div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col"><input name="SSkills_4" class="form-control form-control-sm"></div>
                        <div class="col"><input name="SRate_4" class="form-control form-control-sm"></div>
                        <div class="col"><<input name="SRate_4" class="form-control form-control-sm"></div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col"><input name="SSkills_5" class="form-control form-control-sm"></div>
                        <div class="col"><input name="SRate_5" class="form-control form-control-sm"></div>
                        <div class="col"><<input name="SRate_5" class="form-control form-control-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// SKILLS-->

     <!--TRAININGS-->
    <div class = "row">
        <div class="col-sm-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h6>Trainings</h6>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option" style="width: 90px;">
                            <li><i class="ik ik-chevron-left action-toggle ik-chevron-right"></i></li>
                            <li><i class="ik minimize-card ik-minus"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row align-items-center">
                        <div class="col font-weight-bold bg-light py-2">Course</div>
                        <div class="col font-weight-bold bg-light py-2">From</div>
                        <div class="col font-weight-bold bg-light py-2">To</div>
                        <div class="col font-weight-bold bg-light py-2">Conducted By</div>
                        <div class="col font-weight-bold bg-light py-2">Venue</div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col"><input name="TCourse_1" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TFrom_1" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TTo_1" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TConductedBy_1" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TVenue_1" class="form-control form-control-sm"></div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col"><input name="TCourse_2" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TFrom_2" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TTo_2" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TConductedBy_2" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TVenue_2" class="form-control form-control-sm"></div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col"><input name="TCourse_3" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TFrom_3" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TTo_3" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TConductedBy_3" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TVenue_3" class="form-control form-control-sm"></div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col"><input name="TCourse_4" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TFrom_4" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TTo_4" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TConductedBy_4" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TVenue_4" class="form-control form-control-sm"></div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col"><input name="TCourse_5" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TFrom_5" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TTo_5" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TConductedBy_5" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TVenue_5" class="form-control form-control-sm"></div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col"><input name="TCourse_6" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TFrom_6" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TTo_6" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TConductedBy_6" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TVenue_6" class="form-control form-control-sm"></div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col"><input name="TCourse_7" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TFrom_7" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TTo_7" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TConductedBy_7" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TVenue_7" class="form-control form-control-sm"></div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col"><input name="TCourse_8" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TFrom_8" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TTo_8" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TConductedBy_8" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TVenue_8" class="form-control form-control-sm"></div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col"><input name="TCourse_9" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TFrom_9" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TTo_9" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TConductedBy_9" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TVenue_9" class="form-control form-control-sm"></div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col"><input name="TCourse_10" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TFrom_10" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TTo_10" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TConductedBy_10" class="form-control form-control-sm"></div>
                        <div class="col"><input name="TVenue_10" class="form-control form-control-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// TRAININGS-->


</form>
@endsection