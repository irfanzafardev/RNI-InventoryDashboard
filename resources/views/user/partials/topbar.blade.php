<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top">
  @yield('breadcrumb')

  <!-- Sidebar Toggle (Topbar) -->
  <button
    id="sidebarToggleTop"
    class="btn btn-link d-md-none rounded-circle mr-3"
  >
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">
    <div class="pt-4 pe-2 text-dark">
      {{-- {{ $today }}, {{ $now }} --}}
    </div>
    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->

    <li class="nav-item dropdown no-arrow">
      <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }} |
          {{ Auth::user()->company->company_name }} |
          User
          <img class="ms-3" src="{{ asset('img/user.png') }}" width="25px" />
      </a>
      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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