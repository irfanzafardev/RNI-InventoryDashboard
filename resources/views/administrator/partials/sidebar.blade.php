<!-- Sidebar -->
<ul class="navbar-nav bg-white sidebar accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a
  class="sidebar-brand d-flex align-items-center justify-content-center mt-2 mb-4"
  href="/"
  style="max-height: 40px"
  >
  <div class="logo d-none d-md-flex justify-content-center mt-3 pr-4">
    <img src="../../../img/idfood.png" width="110px">
  </div>
  <div class="logo d-flex d-md-none justify-content-center mt-3 pr-2">
    <img src="../../../img/idfood.png" width="60px">
  </div>
  </a>

  <!-- Divider -->

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('/') ? 'active' : '' }} py-2" href="/">
      <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
      <span>Dashboard</span></a
    >
  </li>

  <!-- Heading -->
  <div class="nav-heading text-dark text-center text-md-left mx-3">Master User</div>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('administrator/users*') ? 'active' : '' }} py-2" href="/administrator/users">
      <span>User Management</span></a
    >
  </li>

  <!-- Heading -->
  <div class="nav-heading text-dark text-center text-md-left mx-3">Master Company</div>


  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('administrator/companies*') ? 'active' : '' }} py-2" href="/administrator/companies">
      <span>Master Company</span></a
    >
  </li>

  <!-- Heading -->
  <div class="nav-heading text-dark text-center text-md-left mx-3">Master Data</div>


  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('administrator/products*') ? 'active' : '' }} py-2" href="/administrator/products">
      <span>Product Items</span></a
    >
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('administrator/classes*') ? 'active' : '' }} py-2" href="/administrator/classes">
      <span>Product Classes</span></a
    >
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('administrator/categories*') ? 'active' : '' }} py-2" href="/administrator/categories">
      <span>Product Category</span></a
    >
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('administrator/subcategories*') ? 'active' : '' }} py-2" href="/administrator/subcategories">
      <span>Sub Product Category</span></a
    >
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('administrator/units*') ? 'active' : '' }} py-2" href="/administrator/units">
      <span>Product UOM</span></a
    >
  </li>

  <!-- Heading -->
  <div class="nav-heading text-dark text-center text-md-left mx-3">Warehouse</div>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('administrator/stocks*') ? 'active' : '' }} py-2" href="/administrator/stocks">
      <span>Daily Stock</span></a
    >
  </li>

  <!-- Nav Item - Tables -->
  {{-- <li class="nav-item">
    <a class="nav-link {{ Request::is('administrator/stockout*') ? 'active' : '' }} py-2" href="/administrator/stockout">
      <span>Stock Out</span></a
    >
  </li> --}}

  <!-- Report -->
  <div class="nav-heading text-dark text-center text-md-left mx-3">Report</div>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('administrator/report*') ? 'active' : '' }} py-2" href="/administrator/report">
      <span>Stock Report</span>
    </a>
  </li>

  <!-- Nav Item - Tables -->
  {{-- <li class="nav-item">
    <a class="nav-link py-2" href="#">
      <span>Report Stock Out</span></a
    >
  </li> --}}

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline mt-3">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->