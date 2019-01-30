@extends('layouts.admin_dashboard')
@section('content')
    <br>
    <!-- panel list of applicants -->
    <div class="panel panel-default">
        <div class="panel-heading" style="font-family: 'Kreon', serif; font-size: 20px;">See  Aplicants Profile</div>
        <div class="panel-body">
            <article>
                <div class="row">
                    <a href="{{route('download.show', $documents->id)}}" class="btn btn-raised btn-warning btn-xs pull-right" style="margin-right: 10px;">Download CV</a>

                    <a href="{{route('admin.index')}}" class="btn btn-raised btn-primary btn-xs pull-right" style="margin-right: 10px;">Back</a>

                    <div class="col-md-3"> 
                        <span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size:20px;">
                        </span> <i style="font-size:20px;"> {!! $user_detail->full_name !!}  </i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3" style="font-size:15px;"> Gender: {!! $user_detail->gender !!} </div>
                </div>
                <div class="row">
                    <div class="col-md-5" style="font-size:15px;">
                        <span class="glyphicon glyphicon-calendar">
                        </span>
                        {!! $user_detail->birthday_place !!}
                        {!! $user_detail->birthday_date !!}    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8" style="font-size:15px;">
                        <span class="glyphicon glyphicon-home"></span>
                        {!! $user_detail->address !!}
                    </div>
                </div>
            </article>
            <br/><br/>
            <div class="row">
                <div class="col-md-6">
                    <h4> Educational Backgrounds </h4>
                    @foreach($edu_backgrounds as $edu_list)
                        <article>
                            <div class="row-fluid" style="font-size: 20px;">
                                <i class="fas fa-school" style="font-size: 20px; padding-right: 12px;"></i>
                                {!! $edu_list->institution_name !!}
                            </div>
                            <div class="row-fluid" style="font-size: 15px;">
                                <i class="fas fa-graduation-cap" style="font-size: 18px; padding-left: 7px; padding-right: 12px;"></i>
                                Degree: {!! $edu_list->degree !!}
                            </div>
                            <div class="row-fluid" style="font-size: 15px;">
                                <i class="fas fa-graduation-cap" style="font-size: 18px; padding-left: 7px; padding-right: 12px;"></i>
                                @if($edu_list->major == null)
                                    Major: -
                                @else
                                    Major: {!! $edu_list->major !!}
                                @endif
                            </div>
                            <div class="row-fluid" style="font-size: 15px;">
                                @if($edu_list->gpa == null)
                                    GPA: -
                                @else
                                    GPA: {!! $edu_list->gpa !!}
                                @endif
                            </div>
                        </article>
                        <br/>
                    @endforeach
                </div> <!-- end col-md-6 -->
                <div class="col-md-6">
                    <h4> Work Experiences </h4>
                    @foreach($work_experiences as $work_list)
                        <article>
                            <div class="row-fluid" style="font-size: 20px;">
                                <i class="fas fa-fas fa-building" style="font-size: 20px; padding-right: 12px;"></i>
                                {!! $work_list->company_name !!}
                            </div>
                            <div class="row-fluid" style="font-size: 15px;">
                                <i class="fas fa-globe-europe" style="font-size: 18px; padding-left: 3px; padding-right: 14px;"></i>
                                {!! $work_list->job_location_city !!}
                            </div>
                            <div class="row-fluid" style="font-size: 15px;">
                                <i class="fas fa-suitcase" style="font-size: 18px; padding-left: 3px; padding-right: 14px;"></i>
                                {!! $work_list->position !!}
                            </div>
                            <div class="row-fluid" style="font-size: 15px;">
                                <i class="fas fa-calendar-alt" style="font-size: 18px; padding-left: 3px; padding-right: 20px;"></i>Start month: {!! $work_list->start_month !!}
                                <i class="fas fa-calendar-alt" style="font-size: 18px; padding-left: 65px; padding-right: 12px;"></i>Start year: {!! $work_list->start_year !!}
                            </div>
                            <div class="row-fluid" style="font-size: 15px;">
                                <i class="fas fa-calendar-alt" style="font-size: 18px; padding-left: 3px; padding-right: 20px;"></i>End month: {!! $work_list->end_month !!}
                                <i class="fas fa-calendar-alt" style="font-size: 18px; padding-left: 67px; padding-right: 12px;"></i>End year: {!! $work_list->end_year !!}
                            </div>
                            <div class="row-fluid" style="font-size: 15px;">
                                Job desc: {!! $work_list->job_desc !!}
                            </div>
                        </article>
                        <br/>
                    @endforeach
                </div> <!-- end col-md-6 -->
            </div>
        </div> <!-- end div panel body -->
    </div>
@stop