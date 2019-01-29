<!-- for educational backgrounds -->
<h3>Educational Backgrounds</h3>
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
            {!! Form::open(array('route' => array('edu-backgrounds.destroy', $edu_list->id), 'method' => 'delete', 'class' => 'form-inline')) !!}
                <i class="fas fa-calendar-alt" style="font-size: 18px; padding-left: 10px; padding-right: 20px;"></i>Start year: {!! $edu_list->start_year !!}
                <i class="fas fa-calendar-alt" style="font-size: 18px; padding-left: 35px; padding-right: 12px;"></i>Completion year: {!! $edu_list->completion_year !!}
                <i class="fas fa-calendar-alt" style="font-size: 18px; padding-left: 35px; padding-right: 12px;"></i>
                @if($edu_list->gpa == null)
                    GPA: -
                @else
                    GPA: {!! $edu_list->gpa !!}
                @endif
            {!! Form::close() !!}
        </div>
    </article>
    <br/>
@endforeach

<!-- for work experiences -->
<h3>Work Experience</h3>
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
            {!! Form::open(array('route' => array('work-experiences.destroy', $work_list->id), 'method' => 'delete', 'class' => 'form-inline')) !!}
                <i class="fas fa-tasks" style="font-size: 18px; padding-left: 3px; padding-right: 14px;"></i>
                {!! $work_list->job_desc !!}
            {!! Form::close() !!}
        </div>
    </article>
@endforeach