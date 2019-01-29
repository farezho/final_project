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
    <link rel="stylesheet" href="{{asset('css/show_modal.css')}}" />
    
    <!-- animated css for notification -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Kreon:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cousine" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hammersmith+One" rel="stylesheet">

    <!-- HIDE AND SHOW -->
    <script type="text/javascript">
      function munculTxtbox() {
        var elem = document.getElementById("degree");

        if((elem.value == "bachelor") || (elem.value == "magister")) {
          document.getElementById("gpa").style.display = "block"; 
          document.getElementById("major").style.display = "block";
        } else {
          document.getElementById('gpa').value = 0;
          document.getElementById("gpa").setAttribute('value',0);
          document.getElementById("gpa").style.display = "none"; 
          document.getElementById("major").style.display = "none";
        }
      }
    </script>
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

        <h2 style="text-align: center; color: white; font-weight: bold; font-family: 'Hammersmith One', sans-serif; margin-top: 250px; font-size: 35px;">User Panel</h2>

        <div class="vertical-menu">
            <a href="{{ route('userdash.index') }}" class="active">Dashboard</a>
            <a href="{{ route('userdash.show',Auth::user()->id) }}"> See Your Profile </a>
        </div>

        <!-- search -->
        <!-- <div class="input-group">
          <input type="text" class="form-control" placeholder="Search Blog..">
          <span class="input-group-btn">
          <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
          </button>
          </span>
        </div>  -->
        <!-- end search -->
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
          @if (Session::has('edu_backgrounds'))
            <div class="session-flash alert alert-danger animated slideInDown" role="alert" style="font-size:23px; font-family: 'Markazi Text', serif;">
                <strong>{{Session::get('edu_backgrounds')}}</strong>
                <a href="{{ route('edu-backgrounds.create') }}" class="alert-link">Click here to fill the form</a>
            </div>  
          @endif
        </div>
        <div class="row-fluid">
          @if (Session::has('work_experiences'))
            <div class="session-flash alert alert-warning animated slideInDown" role="alert" style="font-size:23px; font-family: 'Markazi Text', serif;">
                <strong>{{Session::get('work_experiences')}}</strong>
                <a href="{{ route('work-experiences.create') }}" class="alert-link">Click here to fill the form</a>
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

  <!-- JS Show Modal cv status -->
  <script type="text/javascript">
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("messages");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
  <!-- end js modal cv status -->

</body>
</html>
