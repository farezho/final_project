<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job App</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" /> -->
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('css/bootstrap-responsive.min.css')}}" />

    <!-- animated css for notification -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">

    <!-- <link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}" /> -->
    <link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-media.css')}}" />
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="{{asset('css/jquery.gritter.css')}}" /> -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    <!-- <link rel="stylesheet" href="{{asset('css/clearfix.css')}}" /> -->

    <!-- font header -->
    <link href="https://fonts.googleapis.com/css?family=Palanquin+Dark" rel="stylesheet">

    <!-- font alert -->
    <link href="https://fonts.googleapis.com/css?family=Markazi+Text:500" rel="stylesheet">

    <style>
      #user-panel{
          font-family: 'Palanquin Dark', sans-serif;
          color: white; font-size: 23px;
          position: absolute;
          margin-top: 25px;
          margin-left: 40px;
      }

      .control-label, .controls{
        font-size: 15px;
      }

      article{
        margin-top: 10px;
        padding-left: 10px;
      }

      article:nth-child(odd){ /* genap */
        border-left-style: solid;
        border-left-color: teal;
        border-left-width: 1px;
        border-left-width: 5px;
      }

      article:nth-child(even){ /* ganjil */
        border-left-style: solid;
        border-left-color: lightseagreen;
        border-left-width: 1px;
        border-left-width: 5px;
      }
    </style>

    <!-- JS BUAT HIDE AND SHOW NAMA MENTOR -->
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

<!-- Header-part-->
<div id="header">
  <p id="user-panel">USER PANEL</p>
</div>
<!--close-Header-part  -->

<!--top-Header-menu-->
<div id="user-nav">
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: black; border: none;">{{ Auth::user()->name }}
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">My Profile</a></li>
      <li>
        <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="font-size: 13px;">
          <i class="icon-key"></i>
          Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </li>
    </ul>
  </div>
  <!-- <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text" style="font-size: 15px;">{{ Auth::user()->name }}</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#" style="font-size: 13px;"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li>
          <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" style="font-size: 13px;">
            <i class="icon-key"></i>
            Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </li>
  </ul> -->
</div>
<!--close-top-Header-menu-->

<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="{{ route('userdash.index') }}"><i class="icon icon-home"></i> <span style="font-size: 15px;">Dashboard</span></a> </li>
    <li> <a href="#"><i class="icon icon-inbox"></i> <span style="font-size: 15px;">Other menu</span></a> </li>
  </ul>
</div>
<!--sidebar-menu-->

<!-- Bagian Content -->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
      <div id="breadcrumb"> <a href="{{ url('/user') }}" title="Go to Home" class="tip-bottom"style="font-size: 15px;"><i class="icon-home"></i> </a></div>
  </div>
  <!--End-breadcrumbs-->

  <div class="container-fluid">
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
<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Template Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>

<!--end-Footer-part-->

<script src="{{asset('js/excanvas.min.js')}}"></script> 
<script src="{{asset('js/jquery.min.js')}}"></script> 
<script src="{{asset('js/jquery.ui.custom.js')}}"></script> 
<script src="{{asset('js/bootstrap.min.js')}}"></script> 
<script src="{{asset('js/jquery.flot.min.js')}}"></script> 
<script src="{{asset('js/jquery.flot.resize.min.js')}}"></script> 
<script src="{{asset('js/jquery.peity.min.js')}}"></script> 
<script src="{{asset('js/fullcalendar.min.js')}}"></script> 
<script src="{{asset('js/matrix.js')}}"></script> 
<script src="{{asset('js/matrix.dashboard.js')}}"></script> 
<script src="{{asset('js/jquery.gritter.min.js')}}"></script> 
<script src="{{asset('js/matrix.chat.js')}}"></script> 
<script src="{{asset('js/jquery.validate.js')}}"></script> 
<script src="{{asset('js/matrix.form_validation.js')}}"></script> 
<script src="{{asset('js/jquery.wizard.js')}}"></script> 
<script src="{{asset('js/jquery.uniform.js')}}"></script> 
<script src="{{asset('js/select2.min.js')}}"></script> 
<script src="{{asset('js/matrix.popover.js')}}"></script> 
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('js/matrix.tables.js')}}"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>

<script type="text/javascript">
  $(document).ready(function() { 
    $('#status').ajaxForm(function(message) {
      //$('#content').html(message);
      alert('AAAAAAAA');
      return false;
    }); 
  }); 
</script>

</body>
</html>
