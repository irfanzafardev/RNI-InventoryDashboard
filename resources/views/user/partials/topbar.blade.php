<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top">
  <img src="../../../img/login-logo.svg" alt="" width="120px" class="ms-2 me-3" />
  <div class="topbar-divider d-none d-sm-block"></div>
  <div class="pt-2 d-none d-md-block">
    @yield('breadcrumb')
  </div>

  <!-- Sidebar Toggle (Topbar) -->
  <button
    id="sidebarToggleTop"
    class="btn btn-link d-md-none rounded-circle mr-3"
  >
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">
    <div class="text-style-small d-none d-md-block pt-4 pr-4">
      {{ $today }}, {{ $now }}
    </div>
    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->

    <li class="nav-item dropdown no-arrow">
      <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          <div class="d-none d-md-block">
            {{ Auth::user()->name }} |
            {{ Auth::user()->company->company_name }} |
            Staff
          </div>
          <img class="ms-3 me-1" src="{{ asset('img/user.png') }}" width="25px" />
          <i class="fa-solid fa-caret-down"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <div class="d-block d-md-none text-center pl-2">
          {{ Auth::user()->name }} |
          {{ Auth::user()->company->company_name }} |
          Staff
        </div>
        <hr class="dropdown-divider d-block d-md-none">
        <a class="dropdown-item" href="{{ route('change_password') }}">
          Change Password
        </a>    
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-block">
            @csrf
        </form>
      </div>
    </li>


  </ul>
</nav>
<!-- End of Topbar -->