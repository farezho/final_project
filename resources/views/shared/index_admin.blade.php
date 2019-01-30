@extends('layouts.admin_dashboard')
@section('content')
    <br>
    <!-- panel list of applicants -->
    <div class="panel panel-default">
        <div class="panel-heading" style="font-family: 'Kreon', serif; font-size: 20px;">All Aplicants</div>
        <div class="panel-body">
            @include('admin.list_aplicants')
        </div>
    </div>

    <!-- panel list of cv -->
    <div class="panel panel-default">
        <div class="panel-heading" style="font-family: 'Kreon', serif; font-size: 20px;">Recent CV</div>
        <div class="panel-body">
            @include('admin.list_cv')
        </div>
    </div>
@stop