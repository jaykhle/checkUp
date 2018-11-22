@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
@section('content')
<div class="container">
	<h3 align="center">Searching for Doctors</h3><br />
	<div class="card">
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
@endsection

@section('stylesheets')
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