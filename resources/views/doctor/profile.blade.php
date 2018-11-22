@extends('layouts.app')
@section('title', 'Doctor Profile')
@section('stylesheets')
<style type="text/css">
.profile-image {
	width: 150px;
	background-color: rgba(0,0,0,0.3);
}
</style>
@endsection

@section('content')
<div class="container mt-4">
	<div class="row justify-content-center">
		<div class="col-sm-2 mr-4">
			<!-- Profile Image -->
			<img class="profile-image rounded-circle p-1" src="/imgs/user/default.png" alt="Your Profile Image">
		</div>
		<div class="col-sm-9 p-4">
			<!-- Profile Header -->
			<h3>
				{{ Auth::user()->fullName }}
				<small class="text-muted">&commat;{{ Auth::user()->username }}</small>
			</h3>
			<hr class="mt-1 mb-1">
			<h4>
				<small class="text-muted">{{ Auth::user()->specialty }}</small>
			</h4>
		</div>
		<div class="col-sm-12 m-4">
			<ul class="nav nav-tabs nav-justified">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#home">Appointments</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu1">Update Schedule</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane container active" id="home">...</div>
				<div class="tab-pane container fade" id="menu1">...</div>
				<div class="tab-pane container fade" id="menu2">...</div>
			</div>
		</div>
	</div>
</div>
@endsection