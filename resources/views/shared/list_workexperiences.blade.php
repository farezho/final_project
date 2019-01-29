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


                <button type="submit" class="btn btn-raised btn-danger btn-xs pull-right"  onclick="return confirm('are you sure?')">Delete</button> 

                <a href="{{route('work-experiences.edit', $work_list->id)}}" class="btn btn-raised btn-warning btn-xs pull-right" style="margin-right: 10px;">Edit</a>
            {!! Form::close() !!}
        </div>
    </article>
    <br/>
@endforeach