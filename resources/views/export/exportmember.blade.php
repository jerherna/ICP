@extends('layouts.app')

@section('content')
<div class="page-header">
	<div class="row flex-column-reverse flex-lg-row">
		<div class="col-lg-4 col-sm-12">
			<div class="page-header-title">
				<i class="ik ik-file-text bg-blue"></i>
				
				<div class="d-inline">
					<h5>Export Accounts To Excel</h5>
				</div>
			</div>
		</div>
	</div>
</div>

<a href="/exportmembers" class="btn-lg btn-primary mx-auto my-auto">Export Members</a>

@endsection