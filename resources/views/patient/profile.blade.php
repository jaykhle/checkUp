@extends('layouts.app')
@section('title', 'Patient Profile')

@section('content')
<div class="container mt-4">
	<div class="row justify-content-center">
		<div class="col-sm-12">
			<!-- Profile Header -->
			<h3>
				{{ Auth::user()->fullName }}
				<small class="text-muted">&commat;{{ Auth::user()->username }}</small>
			</h3>
		</div>
		<div class="col-sm-12 m-4">
			<ul class="nav nav-tabs nav-justified">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#home">Appointments</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu1">Search Doctor</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu2">Medicine Reminder</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu3">View Medical History</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane container active" id="home">...</div>
				<div class="tab-pane container fade" id="menu1">
					<div class="card m-3">
						<div class="card-header">Search Doctor Data</div>
						<div class="card-body">
							<div class="form-group">
								<input type="text" name="search" id="search" class="form-control" placeholder="Search" />
							</div>
							<div class="table-responsive table-sm">
								<h5 style="padding: 20px;" align="center">Total Records : <span id="total_records"></span></h3>
									<table class="table table-striped table-bordered">
										<thead class="thead-dark">
											<tr>
												<th>Doctor ID</th>
												<th>First Name</th>
												<th>Last Name</th>
												<th>Age</th>
												<th>Specialty</th>
												<th>City</th>
												<th>Address</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>    
						</div>
					</div>
					<div class="tab-pane container fade" id="menu2">...</div>
					<div class="tab-pane container fade" id="menu3">...</div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
	$(document).ready(function(){

		fetch_customer_data();

		function fetch_customer_data(query = '')
		{
			$.ajax({
				url:"{{ route('live_search.action') }}",
				method:'GET',
				data:{query:query},
				dataType:'json',
				success:function(data)
				{
					$('tbody').html(data.table_data);
					$('#total_records').text(data.total_data);
				}
			})
		}

		$(document).on('keyup', '#search', function(){
			var query = $(this).val();
			fetch_customer_data(query);
		});
	});
</script>
@endsection