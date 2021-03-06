@extends('layouts.user_dashboard')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading" style="font-family: 'Kreon', serif; font-size: 20px;">Add Educational Background</div>
        <div class="panel-body">
            {!! Form::open(['route' => 'edu-backgrounds.store', 'class' => 'form-horizontal col-md-10', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                    @include('shared.form_create_eb')
            {!! Form::close() !!}
        </div>
    </div>
@stop