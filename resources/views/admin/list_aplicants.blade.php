@foreach($user_detail as $user) <!-- using eager loading-->
    <article>
        <!-- <p>{!! $user->user_id !!}</p> -->
        <div class="row">
            <div class="col-md-3"> <span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size:20px;">
                </span> <i style="font-size:20px;"> {!! $user->full_name !!} </i> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-3" style="font-size:15px;"> Gender: {!! $user->gender !!} </div>
        </div>
        <div class="row">
            <div class="col-md-5" style="font-size:15px;">
                <span class="glyphicon glyphicon-calendar">
                </span>
                {!! $user->birthday_place !!}
                {!! $user->birthday_date !!}    
            </div>
        </div>
        <div class="row">
            <div class="col-md-8" style="font-size:15px;">
                <span class="glyphicon glyphicon-home"></span>
                {!! $user->address !!}
            </div>
        </div>
    </article>
@endforeach
