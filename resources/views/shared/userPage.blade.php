@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                @if (Session::has('notice'))
                    <div class="row">
                        <div class="session-flash alert alert-primary animated slideInDown">
                            {{Session::get('notice')}}
                        </div>
                    </div> 
                @endif

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as user!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
