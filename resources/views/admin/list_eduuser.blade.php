@foreach($user_detail as $details)
    @foreach($details->edu_backgrounds()->get() as $edu_list)
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
@endforeach