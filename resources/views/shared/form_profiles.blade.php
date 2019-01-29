@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('notice'))
        <div class="row">
            <div class="session-flash alert alert-danger animated slideInDown">
                {{Session::get('notice')}}
            </div>
        </div>
	@endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>User Details Form</strong></div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'profile.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        <div class="form-group">
                            <!-- label user id -->
                            <label for="user_id" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="user_id" type="hidden" class="form-control" name="user_id" value="{!! $id !!}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="full_name" class="col-md-4 control-label">Full Name</label>

                            <div class="col-md-6">
                                <input id="full_name" type="text" class="form-control" name="full_name">

                                <span class="help-block">
                                    <strong style="color: red;">{!! $errors->first('full_name') !!}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                {!! Form::select('gender', ['male' => 'Male','female'=>'Female'], null, ['class' => 'form-control']) !!}

                                <span class="help-block">
                                    <strong style="color: red;">{!! $errors->first('gender') !!}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="birthday_place" class="col-md-4 control-label">Birhtday Place</label>

                            <div class="col-md-6">
                                <input id="birthday_place" type="text" class="form-control" name="birthday_place">

                                <span class="help-block">
                                    <strong style="color: red;">{!! $errors->first('birthday_place') !!}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="birthday_date" class="col-md-4 control-label">Birhtday Date</label>

                            <div class="col-md-6">
                                <input id="birthday_date" type="date" class="form-control" name="birthday_date">

                                <span class="help-block">
                                    <strong style="color: red;">{!! $errors->first('birthday_date') !!}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone_number" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="number" class="form-control" name="phone_number">

                                <span class="help-block">
                                    <strong style="color: red;">{!! $errors->first('phone_number') !!}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea name="address" id="address" cols="30" rows="10" class="form-control"></textarea>

                                <span class="help-block">
                                    <strong style="color: red;">{!! $errors->first('address') !!}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
