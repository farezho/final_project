@extends('layouts.user_dashboard')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading" style="font-family: 'Kreon', serif; font-size: 20px;">Your Profile</div>
        <div class="panel-body">
            @include('shared.list_profile')
        </div>
    </div>
@stop