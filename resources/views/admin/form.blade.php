<div class="form-group">
    <label for="title" class="col-lg-3 control-label">Document id</label>
    <div class="col-lg-9">
        {!! Form::text('id', $id , array('class' => 'form-control', 'autofocus' => 'true', 'readonly')) !!}
        <div class="text-danger">{!! $errors->first('id') !!}</div>
    </div>
</div>

<div class="form-group">
    <label for="title" class="col-lg-3 control-label">Status</label>
    <div class="col-lg-9">
        <select class="form-control" id="degree" name="status" onchange="return munculTxtbox(this)">
            <option value="read">Read</option>
            <option value="accept">Accept</option>
            <option value="reject">Reject</option>
        </select>
        <div class="text-danger">{!! $errors->first('status') !!}</div>
    </div>
    <div class="clear"></div>
</div>

<div class="form-group">
    <label for="title" class="col-lg-3 control-label">Messages</label>
    <div class="col-lg-9">
        {!! Form::textarea('messages', null , array('class' => 'form-control', 'autofocus' => 'true')) !!}
        <div class="text-danger">{!! $errors->first('messages') !!}</div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-3"></div>
    <div class="col-lg-9">
        <button type="submit" class="btn btn-raised btn-primary">Save</button>
        {!! link_to(route('admin.index'), 'Back', ['class' => 'btn btn-raised btn-info']) !!}
    </div>
    <div class="clear"></div>
</div>