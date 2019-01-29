<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('css/admin_dash_layout.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vertical_menu.css')}}" />
    
    <!-- animated css for notification -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Kreon:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cousine" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hammersmith+One" rel="stylesheet">
</head>
<body>

  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-3 sidenav">
        <div class="row" style="color: white; font-family: 'Josefin Sans', sans-serif; margin-left: auto;">
          {{ Auth::user()->name }}
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="font-size: 13px;" title="Logout">
            <span class="glyphicon glyphicon-log-out" style="color: white; font-size: 15px; margin-top: 10px;"></span>
            
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form> 
        </div>
        <h2 style="text-align: center; color: white; font-weight: bold; font-family: 'Hammersmith One', sans-serif; margin-top: 250px; font-size: 35px;">Admin Panel</h2>

        <div class="vertical-menu">
            <a href="{{ route('admin.index') }}" class="active">Dashboard</a>
            <a href="#"></a>
        </div>
      </div> <!-- end side nav -->

      <div class="col-sm-9">
        <br/>
        <div class="row-fluid">
          @if (Session::has('welcome'))
            <div class="session-flash alert alert-info animated slideInDown" style="font-size:23px; font-family: 'Markazi Text', serif;">
                <strong>{{Session::get('welcome')}}</strong>
            </div>
          @endif
        </div>
        
        <div class="row-fluid">
          @if (Session::has('success'))
            <div class="session-flash alert alert-success animated slideInDown" style="font-size:23px; font-family: 'Markazi Text', serif;">
                <strong>{{Session::get('success')}}</strong>
            </div>
          @endif
        </div>

        @yield('content')
      </div>
    </div>
  </div>

  <footer class="container-fluid">
    <p id="footer">&copy; Farezho</p>
  </footer>

</body>
</html>
