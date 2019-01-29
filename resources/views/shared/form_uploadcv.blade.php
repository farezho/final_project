{!! Form::open(['route' => 'userdash.store', 'method' => 'POST', 'files' => 'true', 'class' => 'form-horizontal']) !!}
    <div class="form-group">
        {!! Form::hidden('detail_id', $detail_id, array('class' => 'form-control', 'autofocus' => 'true')) !!}
        {!! Form::hidden('status', 'uploaded', array('class' => 'form-control', 'autofocus' => 'true')) !!}
        {!! Form::hidden('messages', null, array('class' => 'form-control', 'autofocus' => 'true')) !!}

        <label for="" class="control-label"></label>
        <div class="col-lg-3">
            {!! Form::file('userfile', null, array('class' => 'form-control', 'autofocus' => 'true')) !!}
            <div class="text-danger">{!! $errors->first('userfile') !!}</div>
        </div>
        <div class="col-lg-6">
            <button type="submit" class="btn btn-raised btn-primary" style="boder-radius: 5px;">Upload</button>
            <a href="{{ route('userdash.index') }}" class="btn btn-raised btn-warning" style="boder-radius: 5px;">Cancel</a>
        </div>
        <div class="clear"></div>
    </div>
{!! Form::close() !!}