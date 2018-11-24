@extends('layouts.app')
@section('title', 'Doctor Profile')


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
				<div class="tab-pane container active" id="home">
					<div class="card m-3">
						<div class="card-header">Upcoming Appointments</div>
						<div class="card-body">
							<div class="form-group">
								<input type="text" name="search" id="search" class="form-control" placeholder="Search" />
							</div>
							<div class="table-responsive table-sm">
								<h5 style="padding: 20px;" align="center">Total Records : <span id="total_appointment_records"></span></h5>
								<table id="appointments_table" class="table table-striped table-bordered">
									<thead class="thead-dark">
										<tr>
											<th>Appointment ID</th>
											<th>Date</th>
											<th>Time</th>
											<th>Doctor</th>
											<th>Description</th>
											<th>Medicine</th>
											<th>Bill</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>    
					</div>
				</div>
				<div class="tab-pane container fade" id="menu1">...</div>
				<div class="tab-pane container fade" id="menu2">...</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('stylesheets')
<style type="text/css">
.profile-image {
	width: 150px;
	background-color: rgba(0,0,0,0.3);
}
</style>
<script>
$(document).ready(function(){
	fetch_appointment_data();

	function fetch_appointment_data(query = '')
	{
		$.ajax({
			url:"{{ route('doctor.appointment') }}",
			method:'GET',
			data:{query:query},
			dataType:'json',
			success:function(data)
			{
				$('#appointments_table > tbody').html(data.table_data);
				$('#total_appointment_records').text(data.total_data);
			}
		})
	}

	$(document).on('keyup', '#search', function(){
		var query = $(this).val();
		fetch_appointment_data(query);
	});
});
</script>
@endsection