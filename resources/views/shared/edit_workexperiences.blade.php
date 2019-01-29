@extends('layouts.user_dashboard')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading" style="font-family: 'Kreon', serif; font-size: 20px;">Edit Educational Background</div>
        <div class="panel-body">
            {!! Form::model($work_experiences,['route' => ['work-experiences.update', $work_experiences->id], 'method' => 'put' ,'class' => 'form-horizontal col-md-10', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                @include('shared.form_workexperiences');
            {!! Form::close() !!}
        </div>
    </div>
@stop