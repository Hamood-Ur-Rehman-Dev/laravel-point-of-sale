<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-{{config('settings.navbar_bg')}} navbar-{{config('settings.navbar_fg')}}">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="{{route('home')}}" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="{{ auth()->user()->user_avatar }}" width="30" class="img-circle elevation-2" alt="User Image">
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item" onclick="document.getElementById('logout-form').submit()">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            Logout
            <form action="{{route('logout')}}" method="POST" id="logout-form">
              @csrf
            </form>
          </a>
        </div>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->
