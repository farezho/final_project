@extends('layouts.user_dashboard')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading" style="font-family: 'Kreon', serif; font-size: 20px;">Edit Educational Background</div>
        <div class="panel-body">
            {!! Form::model($edu_backgrounds,['route' => ['edu-backgrounds.update', $edu_backgrounds->id], 'method' => 'put' ,'class' => 'form-horizontal col-md-10', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                @include('shared.form_edubackgrounds');
            {!! Form::close() !!}
        </div>
    </div>
@stop