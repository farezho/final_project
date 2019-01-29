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

                <button type="submit" class="btn btn-raised btn-danger btn-xs pull-right"  onclick="return confirm('are you sure?')">Delete</button> 

                <a href="{{route('edu-backgrounds.edit', $edu_list->id)}}" class="btn btn-raised btn-warning btn-xs pull-right" style="margin-right: 10px;">Edit</a>
            {!! Form::close() !!}
        </div>
    </article>
    <br/>
@endforeach