@extends('layouts.admin_dashboard')
@section('content')
    <div class="panel panel-default" style="margin-top: 30px;">
        <div class="panel-heading" style="font-family: 'Kreon', serif; font-size: 20px;">Edit CV</div>
        <div class="panel-body">
            {!! Form::model($documents,['route' => ['admin.update', $documents->id], 'method' => 'put' ,'class' => 'form-horizontal col-md-10', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                @include('admin.form')
            {!! Form::close() !!}
        </div>
    </div>
@stop