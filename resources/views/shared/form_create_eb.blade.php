<div class="form-group">
    <label for="title" class="col-lg-3 control-label"></label>
    <div class="col-lg-9">
        {!! Form::hidden('detail_id', $detail_id , array('class' => 'form-control', 'autofocus' => 'true')) !!}
        <div class="text-danger">{!! $errors->first('detail_id') !!}</div>
    </div>
</div>

<div class="form-group">
    <label for="title" class="col-lg-3 control-label">Degree</label>
    <div class="col-lg-9">
        <select class="form-control" id="degree" name="degree" onchange="return munculTxtbox(this)">
            <option value="magister">Magister</option>
            <option value="bachelor">Bachelor</option>
            <option value="senior high school">Senior High School</option>
            <option value="junior high school">Junior High School</option>
            <option value="other">Other</option>
        </select>
        <div class="text-danger">{!! $errors->first('degree') !!}</div>
    </div>
    <div class="clear"></div>
</div>

<div class="form-group">
    <label for="title" class="col-lg-3 control-label">Institution Name</label>
    <div class="col-lg-9">
        {!! Form::text('institution_name', null , array('class' => 'form-control', 'autofocus' => 'true')) !!}
        <div class="text-danger">{!! $errors->first('institution_name') !!}</div>
    </div>
</div>

<div class="form-group" id="major">
    <label for="title" class="col-lg-3 control-label">Major</label>
    <div class="col-lg-9">
        {!! Form::text('major', null , array('class' => 'form-control', 'autofocus' => 'true')) !!}
        <div class="text-danger">{!! $errors->first('major') !!}</div>
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
    <label for="title" class="col-lg-3 control-label">Completion Year</label>
    <div class="col-lg-9">
        {!! Form::text('completion_year', null , array('class' => 'form-control', 'autofocus' => 'true')) !!}
        <div class="text-danger">{!! $errors->first('completion_year') !!}</div>
    </div>
</div>

<div class="form-group" id="gpa">
    <label for="title" class="col-lg-3 control-label">GPA</label>
    <div class="col-lg-9">
        {!! Form::text('gpa', null , array('class' => 'form-control', 'autofocus' => 'true')) !!}
        <div class="text-danger">{!! $errors->first('gpa') !!}</div>
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