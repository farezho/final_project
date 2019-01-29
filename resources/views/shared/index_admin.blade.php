@extends('layouts.admin_dashboard')
@section('content')
    <br>
    <!-- panel list of applicants -->
    <div class="panel panel-default">
        <div class="panel-heading" style="font-family: 'Kreon', serif; font-size: 20px;">All Aplicants</div>
        <div class="panel-body">
            @include('admin.list_aplicants')
            <br/>
           <div class="row">
               <div class="col-md-6">
                   <h4>Educational Backgrounds</h4>
                   @include('admin.list_eduuser')
                </div>
               <div class="col-md-6">
                    <h4>Work Experiences</h4>
                    @include('admin.list_weuser')
                </div>
           </div>
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