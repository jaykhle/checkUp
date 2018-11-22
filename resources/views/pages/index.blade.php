@extends('layouts.app')

@section('title', 'Home Page')

@section('stylesheets')
	<style>
		.color1 {
			background-color: #39BDA0;
			border-color: #39BDA0;	
		}
		.color1:hover {
			background-color: #FFFFFF;
			border-color: #FFFFFF;	
			color: #39BDA0;
		}
	</style>
@endsection

@section('content')
    <div class="jumbotron">
		<h1 class="display-4">Welcome to checkUp!</h1>
		<p class="lead">Your healthcare online service</p>
		<hr class="my-4">
		<p>You can look up doctors, book appointments with the doctors, pay for bills, and get reminders of your medicine prescription!</p>
		<a class="btn btn-primary btn-lg color1" href="#" role="button">
			<i class="fas fa-search"></i> Search Now!
		</a>
	</div>
@endsection