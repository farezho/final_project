<div class="form-group">
    <label for="title" class="col-lg-3 control-label"></label>
    <div class="col-lg-9">
        {!! Form::hidden('detail_id', $detail_id , array('class' => 'form-control', 'autofocus' => 'true')) !!}
        <div class="text-danger">{!! $errors->first('detail_id') !!}</div>
    </div>
</div>

<div class="form-group">
    <label for="title" class="col-lg-3 control-label">Company Name</label>
    <div class="col-lg-9">
        {!! Form::text('company_name', null , array('class' => 'form-control', 'autofocus' => 'true')) !!}
        <div class="text-danger">{!! $errors->first('company_name') !!}</div>
    </div>
</div>

<div class="form-group">
    <label for="title" class="col-lg-3 control-label">Job Location City</label>
    <div class="col-lg-9">
        {!! Form::text('job_location_city', null , array('class' => 'form-control', 'autofocus' => 'true')) !!}
        <div class="text-danger">{!! $errors->first('job_location_city') !!}</div>
    </div>
</div>

<div class="form-group">
    <label for="title" class="col-lg-3 control-label">Position</label>
    <div class="col-lg-9">
        {!! Form::text('position', null , array('class' => 'form-control', 'autofocus' => 'true')) !!}
        <div class="text-danger">{!! $errors->first('position') !!}</div>
    </div>
</div>

<div class="form-group">
    <label for="title" class="col-lg-3 control-label">Start Month</label>
    <div class="col-lg-9">
        {!! Form::text('start_month', null , array('class' => 'form-control', 'autofocus' => 'true')) !!}
        <div class="text-danger">{!! $errors->first('start_month') !!}</div>
    </div>
</div>

<div class="form-group">
    <label for="title" class="col-lg-3 control-label">Start Year</label>
    <div class="col-lg-9">
        {!! Form::text('start_year', null , array('class' => 'form-control', 'autofocus' => 'true')) !!}
        <div class="text-danger">{!! $errors->first('start_year') !!}</div>
    </div>
</div>

<div class="form-group">
    <label for="title" class="col-lg-3 control-label">End Month</label>
    <div class="col-lg-9">
        {!! Form::text('end_month', null , array('class' => 'form-control', 'autofocus' => 'true')) !!}
        <div class="text-danger">{!! $errors->first('end_month') !!}</div>
    </div>
</div>

<div class="form-group">
    <label for="title" class="col-lg-3 control-label">End Year</label>
    <div class="col-lg-9">
        {!! Form::text('end_year', null , array('class' => 'form-control', 'autofocus' => 'true')) !!}
        <div class="text-danger">{!! $errors->first('end_year') !!}</div>
    </div>
</div>

<div class="form-group">
    <label for="title" class="col-lg-3 control-label">Job Description</label>
    <div class="col-lg-9">
        {!! Form::text('job_desc', null , array('class' => 'form-control', 'autofocus' => 'true')) !!}
        <div class="text-danger">{!! $errors->first('job_desc') !!}</div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-3"></div>
    <div class="col-lg-9">
        <button type="submit" class="btn btn-raised btn-primary">Save</button>
        {!! link_to(route('userdash.index'), 'Back', ['class' => 'btn btn-raised btn-info']) !!}
    </div>
    <div class="clear"></div>
</div>