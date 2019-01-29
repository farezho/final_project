@foreach($user_detail as $details)
    @foreach($details->work_experience()->get() as $work_list)
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
                {!! $work_list->job_desc !!}
            </div>
        </article>
    @endforeach
@endforeach