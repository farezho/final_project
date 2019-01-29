@extends('layouts.user_dashboard')
@section('content')
    <!-- check if the educational backgrounds still empty -->
    @if($edu_backgrounds->isNotEmpty())
        <div class="panel panel-default">
            <div class="panel-heading" style="font-family: 'Kreon', serif; font-size: 20px;">Educational Backgrounds</div>
            <div class="panel-body">
                <div class="row-fluid">
                    <a href="{{route('edu-backgrounds.create')}}" class="btn btn-raised btn-primary btn-sm pull-right" style="margin-right: 10px;">Add New</a>
                </div>
                <br/><br/>
                @include('shared.list_edubackgrounds')
            </div>
        </div>

        @if($work_experiences->isNotEmpty())
            <div class="panel panel-default">
                <div class="panel-heading" style="font-family: 'Kreon', serif; font-size: 20px;">Work Experiences</div>
                <div class="panel-body">
                    <div class="row-fluid">
                        <a href="{{route('work-experiences.create')}}" class="btn btn-raised btn-primary btn-sm pull-right" style="margin-right: 10px;">Add New</a>
                    </div>
                    <br/><br/>
                    @include('shared.list_workexperiences')  
                </div>
            </div>
        @endif

        <div class="panel panel-default">
            <div class="panel-heading" style="font-family: 'Kreon', serif; font-size: 20px;">CV Info</div>
            <div class="panel-body">
                @if($documents->isEmpty())
                    <h4> Upload CV </h4>
                    @include('shared.form_uploadcv')
                @endif

                <div class="row">
                    <div class="col-md-5">
                        <h4> CV Status </h4>
                        @foreach($documents as $document)
                            @if($document->status == "uploaded")
                                <button class="btn btn-raised btn-primary" id="status" style="border-radius:5px;" title="CV status: uploaded">
                                    <span class="glyphicon glyphicon-open"></span>
                                </button>
                                <button class="btn btn-raised btn-primary" id="messages" style="border-radius:5px;" title="No messages yet">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </button>
                            @endif
                            @if($document->status == "read")
                                <button class="btn btn-raised btn-info" id="status" style="border-radius:5px;" title="CV status: read">
                                    <span class="glyphicon glyphicon-save"></span>
                                </button>
                                <button class="btn btn-raised btn-primary" id="messages" style="border-radius:5px;" title="No messages yet">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </button>
                            @endif
                            @if($document->status == "accept")
                                <button class="btn btn-raised btn-success" id="status" style="border-radius:5px;" title="CV status: accepted">
                                    <span class="glyphicon glyphicon-ok"></span>
                                </button>
                                <button class="btn btn-raised btn-success" id="messages" style="border-radius:5px;" title="Click to see the messages">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </button>
                            @endif
                            @if($document->status == "reject")
                                <button class="btn btn-raised btn-danger" id="status" style="border-radius:5px;" title="CV status: reject">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </button>
                                <button class="btn btn-raised btn-success" id="messages" style="border-radius:5px;" title="Click to see the messages">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </button>
                            @endif
                        @endforeach
                    </div>

                    <!-- The Modal when user click button cv status -->
                    <div id="myModal" class="modal" style="margin-top: 50px;">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="close">&times;</span>
                                <h2 style="text-align: center;">Messages</h2>
                            </div>
                            <div class="modal-body">
                                <p>{!! $document->messages !!}</p>
                            </div>
                        </div>
                    </div>
                    <!-- end modal of cv status -->
                </div>
            </div>
        </div>
    @endif <!-- end if edu_backgrounds -->
@stop