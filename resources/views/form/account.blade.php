@extends('layouts.app')

@section('content')
<div class="page-header">
	<div class="row flex-column-reverse flex-lg-row">
		<div class="col-lg-4 col-sm-12">
			<div class="page-header-title">
				<i class="ik ik-file-text bg-blue"></i>
				
				<div class="d-inline">
					<h5>Account Profile</h5>
					<span>New Account Profile</span>
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
	<!-- ACCOUNT PROFILE -->
	

	
	<div class = "row">
		<div class="col-sm-12">
			<div class="card mb-3">
				<div class="card-header">
					<h6>Account Profile</h6>
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
									<img src="{{ asset('img/empty-profile.jpg') }}" data-img-name="" class="profile-pic img-fluid img-thumbnail rounded">
									<div class="btn-group btn-group-sm" role="group" aria-label="Profile Picture Action">
										<button type="button" class="update file-upload-browse btn btn-sm btn-primary" data-img-name="">
											<i class="fa fa-folder-open"></i>
										</button>
										<button type="button" class="btn btn-sm btn-danger delete" data-img-name="" >
											<i class="fa fa-trash"></i>
										</button>
									</div>
									
									<!-- Form Attachment -->
									<div class="form-group">
										<input type="file" name="%%File.1" class="file-upload-default" data-img-name="">
										<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image" hidden>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label"><strong>Church Name</strong></label>
								<div class="col-sm-8">
									<input name="ChurchName" value="" data-cus-label="Church Name" data-value="" class="form-control form-control-sm">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label"><strong>Location</strong></label>
								<div class="col-sm-8">
									<input name="Location" value="" data-cus-label="Location" data-value="" class="form-control form-control-sm">
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="col-sm-6 no-gutters">
							<div class="form-group row">
								<div class="col-sm-4">
									<label class="col-form-label text-center"><strong>About</strong></label>
								</div>
								<div class="col-sm-8 text-justify">
									<textarea name="About" class="form-control" rows="8" data-cus-label="About" cols="20" data-value=""></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-4">
									<label class="col-form-label text-center"><strong>Description</strong></label>
								</div>
								<div class="col-sm-8 text-justify">
									<textarea name="Description" class="form-control" rows="8" data-cus-label="Description" cols="20" data-value=""></textarea>
								</div>
							</div>
						</div>
	
						<div class="col-sm-6 no-gutters">
							<div class="form-group row">
								<div class="col-sm-4">
									<label class="col-form-label text-center"><strong>Vision</strong></label>
								</div>
								<div class="col-sm-8 text-justify">
									<textarea name="Vision" class="form-control" rows="8" data-cus-label="Vision" cols="20" data-value=""></textarea>
								</div>
							</div>
	
							<div class="form-group row">
								<div class="col-sm-4">
									<label class="col-form-label text-center"><strong>Mission</strong></label>
								</div>
								<div class="col-sm-8 text-justify">
									<textarea name="Mission" class="form-control" rows="8" data-cus-label="Mission" cols="20" data-value=""></textarea>
								</div>
							</div>
	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ACCOUNT PROFILE -->

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


</form>
@endsection