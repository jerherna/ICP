@extends('layouts.app')

@section('content')
<div class="page-header">
	<div class="row flex-column-reverse flex-lg-row">
		<div class="col-lg-4 col-sm-12">
			<div class="page-header-title">
				<i class="ik ik-file-text bg-blue"></i>
				
				<div class="d-inline">
					<h5>Account Change Request</h5>
					<span>{{$Info->church_name}}</span>
				</div>
			</div>
		</div>
	</div>
</div>





<!-- hidden remove attachment checkbox -->
<!--<div class="row" hidden>
	<div class="col-sm-12">
		<Computed Value>
	</div>
</div>-->

<form action="/sendrequestaccount" method="POST" enctype="multipart/form-data">
	@csrf
	<!-- ACCOUNT PROFILE -->
	<!--<div class="col-sm-4 ml-auto">
		<div class="d-flex justify-content-center">
			<div class="show-image">
				<img src="/hris-modern/hris-personnelinfo.nsf/img/empty-profile.jpg?" data-img-name="" class="profile-pic img-fluid img-thumbnail rounded">
                <div class="btn-group btn-group-sm" role="group" aria-label="Profile Picture Action">
					<button type="button" class="update file-upload-browse btn btn-sm btn-primary" data-img-name="">
						<i class="fa fa-folder-open"></i>
					</button>
					<button type="button" class="btn btn-sm btn-danger delete" data-img-name="">
						<i class="fa fa-trash"></i>
					</button>
				</div>

				Form Attachment
				<div class="form-group">
					<input type="file" name="AccountImg" class="file-upload-default form-control form-control-sm" data-img-name="">
					<input type="text" class="form-control file-upload-info form-control-sm" disabled="" placeholder="Upload Image" hidden="">
				</div>
			</div>
		</div>
	</div>-->
	<input type="hidden" name="cid" value="{{ $Info->id }}">
	<input type="hidden" name="requestor" value="{{ Auth::user()->name }}">
	
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
										<input type="file" name="%%File.1" class="file-upload-default" data-img-name="" >
										<input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image" hidden >
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label"><strong>Church Name</strong></label>
								<div class="col-sm-8">
									<input name="ChurchName" value="{{$Info->church_name}}" data-cus-label="Church Name" data-value="" class="form-control form-control-sm" >
									<input name="ChurchName_1" value="{{$Info->church_name}}" data-cus-label="Church Name" data-value="" class="form-control form-control-sm" hidden>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label"><strong>Location</strong></label>
								<div class="col-sm-8">
									<input name="Location" value="{{$Info->location}}" data-cus-label="Location" data-value="" class="form-control form-control-sm" >
									<input name="Location_1" value="{{$Info->location}}" data-cus-label="Location" data-value="" class="form-control form-control-sm" hidden>
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
									<textarea name="About"  class="form-control" rows="8" data-cus-label="About" cols="20" data-value="" >{{$Info->about}}</textarea>
									<textarea name="About_1"  class="form-control" rows="8" data-cus-label="About" cols="20" data-value="" hidden>{{$Info->about}}</textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-4">
									<label class="col-form-label text-center"><strong>Description</strong></label>
								</div>
								<div class="col-sm-8 text-justify">
									<textarea name="Description" class="form-control" rows="8" data-cus-label="Description" cols="20" data-value="" >{{$Info->description}}</textarea>
									<textarea name="Description_1" class="form-control" rows="8" data-cus-label="Description" cols="20" data-value="" hidden>{{$Info->description}}</textarea>
								</div>
							</div>
						</div>
	
						<div class="col-sm-6 no-gutters">
							<div class="form-group row">
								<div class="col-sm-4">
									<label class="col-form-label text-center"><strong>Vision</strong></label>
								</div>
								<div class="col-sm-8 text-justify">
									<textarea name="Vision" class="form-control" rows="8" data-cus-label="Vision" cols="20" data-value="" >{{$Info->vision}}</textarea>
									<textarea name="Vision_1" class="form-control" rows="8" data-cus-label="Vision" cols="20" data-value="" hidden>{{$Info->vision}}</textarea>
								</div>
							</div>
	
							<div class="form-group row">
								<div class="col-sm-4">
									<label class="col-form-label text-center"><strong>Mission</strong></label>
								</div>
								<div class="col-sm-8 text-justify">
									<textarea name="Mission" class="form-control" rows="8" data-cus-label="Mission" cols="20" data-value="" >{{$Info->mission}}</textarea>
									<textarea name="Mission_1" class="form-control" rows="8" data-cus-label="Mission" cols="20" data-value="" hidden>{{$Info->mission}}</textarea>
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
									<input name="Email" value="{{$Info->email}}" data-cus-label="Email" data-value="" class="form-control form-control-sm" >
									<input name="Email_1" value="{{$Info->email}}" data-cus-label="Email" data-value="" class="form-control form-control-sm" hidden>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Mobile No.</label>
								<div class="col-sm-8">
									<input name="MobileNo" value="{{$Info->mobile}}" data-cus-label="Mobile No." size="35" data-value="" class="form-control form-control-sm" >
									<input name="MobileNo_1" value="{{$Info->mobile}}" data-cus-label="Mobile No." size="35" data-value="" class="form-control form-control-sm" hidden>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Denomination Affilitation</label>
								<div class="col-sm-8">
									<input name="DenomAffiliate" value="{{$Info->denomination_affiliation}}" data-cus-label="Denomination Affiliation" data-value="" class="form-control form-control-sm" >
									<input name="DenomAffiliate_1" value="{{$Info->denomination_affiliation}}" data-cus-label="Denomination Affiliation" data-value="" class="form-control form-control-sm" hidden>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Church Type</label>
								<div class="col-sm-8">
									<input name="ChurchType" value="{{$Info->church_type}}" data-cus-label="Church Type" data-value="" class="form-control form-control-sm">
									<input name="ChurchType_1" value="{{$Info->church_type}}" data-cus-label="Church Type" data-value="" class="form-control form-control-sm" hidden>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Church and Staff Leaders</label>
								<div class="col-sm-8">
									<input name="StaffAndLeaders" value="{{$Info->church_and_staff_leaders}}" data-cus-label="Staff and Leaders" data-value="" class="form-control form-control-sm" >
									<input name="StaffAndLeaders_1" value="{{$Info->church_and_staff_leaders}}" data-cus-label="Staff and Leaders" data-value="" class="form-control form-control-sm" hidden>
								</div>
							</div>



						</div>
						<div class="col-sm-6 no-gutters">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Telephone No.</label>
								<div class="col-sm-8">
									<input name="TelNo" value="{{$Info->telephone}}" data-cus-label="Telephone No." size="35" data-value="" class="form-control form-control-sm" >
									<input name="TelNo_1" value="{{$Info->telephone}}" data-cus-label="Telephone No." size="35" data-value="" class="form-control form-control-sm" hidden>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label"><i class="fab fa-facebook-square"></i> Facebook</label>
								<div class="col-sm-1" style="padding-top:7px; padding-bottom:7px;"><input type="checkbox" id="social-fb" name="social-fb" value="Facebook" class="fb-checkbox"></div>
								<div class="fb-value col-sm-8">
									<input name="SocialFB" value="{{$Info->facebook_handle}}" data-cus-label="Facebook Profile" data-value="" class="form-control form-control-sm" >
									<input name="SocialFB_1" value="{{$Info->facebook_handle}}" data-cus-label="Facebook Profile" data-value="" class="form-control form-control-sm" hidden>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label"><i class="fab fa-twitter-square"></i> Twitter</label>
								<div class="col-sm-1" style="padding-top:7px; padding-bottom:7px;"><input type="checkbox" id="social-tw" name="social-tw" value="Twitter" class="tw-checkbox"></div>
								<div class="tw-value col-sm-8">
									<input name="SocialTwitter" value="{{$Info->twitter_handle}}" data-cus-label="Twitter Profile" data-value="" class="form-control form-control-sm" >
									<input name="SocialTwitter_1" value="{{$Info->twitter_handle}}" data-cus-label="Twitter Profile" data-value="" class="form-control form-control-sm" hidden>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label"><i class="fab fa-instagram"></i> Instagram</label>
								<div class="col-sm-1" style="padding-top:7px; padding-bottom:7px;"><input type="checkbox" id="social-ig" name="social-ig" value="Instagram" class="ig-checkbox"></div>
								<div class="ig-value col-sm-8">
									<input name="SocialInstagram" value="{{$Info->instagram_handle}}" data-cus-label="Instagram Profile" data-value="" class="form-control form-control-sm" >
									<input name="SocialInstagram_1" value="{{$Info->instagram_handle}}" data-cus-label="Instagram Profile" data-value="" class="form-control form-control-sm" hidden>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label"><i class="fab fa-linkedin"></i> LinkedIn</label>
								<div class="col-sm-1" style="padding-top:7px; padding-bottom:7px;"><input type="checkbox" id="social-li" name="social-li" value="LinkedIn" class="li-checkbox"></div>
								<div class="li-value col-sm-8">
									<input name="SocialLinkedIn" value="{{$Info->linkedin_handle}}" data-cus-label="LinkedIn Profile" data-value="" class="form-control form-control-sm" >
									<input name="SocialLinkedIn_1" value="{{$Info->linkedin_handle}}" data-cus-label="LinkedIn Profile" data-value="" class="form-control form-control-sm" hidden>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label"><i class="fas fa-globe"></i> Website</label>
								<div class="col-sm-1" style="padding-top:7px; padding-bottom:7px;"><input type="checkbox" id="social-web" name="social-web" value="Website" class="web-checkbox"></div>
								<div class="web-value col-sm-8">
									<input name="SocialWebsite" value="{{$Info->website_handle}}" data-cus-label="Website Link" data-value="" class="form-control form-control-sm" >
									<input name="SocialWebsite_1" value="{{$Info->website_handle}}" data-cus-label="Website Link" data-value="" class="form-control form-control-sm" hidden>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Status</label>
								<div class="col-sm-8">
									<input name="Status" value="{{$Info->status}}" data-cus-label="Status" data-value="" class="form-control form-control-sm" >
									<input name="Status_1" value="{{$Info->status}}" data-cus-label="Status" data-value="" class="form-control form-control-sm" hidden>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--//CONTACT DETAILS-->

	<button type="submit" class="btn btn-primary float-right" onclick="return confirm('Are you sure you want send this request?')">Submit Request</button>

</form>
@endsection