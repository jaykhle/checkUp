@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('stylesheets')
    <style type="text/css">
    </style>
@endsection

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <!-- Profile Header -->
            <h3>
                {{ Auth::user()->fullName }}
                <small class="text-muted">&commat;{{ Auth::user()->username }}</small>
            </h3>
            <hr class="mt-1 mb-1">
            <h4>
                <small class="text-muted">Admin {{ Auth::user()->id }}</small>
            </h4>
        </div>
        <div class="col-sm-10 m-4">
            <ul class="nav nav-tabs nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Search Patient</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">Search Doctor</a>
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