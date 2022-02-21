<!-- Sidebar -->
<ul class="navbar-nav bg-white sidebar accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a
    class="sidebar-brand d-flex align-items-center justify-content-center"
    href="/"
  >
    <div class="sidebar-brand-icon">
      <!-- <i class="fas fa-laugh-wink"></i> -->
      <img src="{{ asset('./img/logo-main.png') }}" alt="" width="20px" />
    </div>
    <div class="sidebar-brand-text text-dark mx-4">Inventory User</div>
  </a>

  <!-- Divider -->
  <!-- <hr class="sidebar-divider my-0"> -->

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('/') ? 'active' : '' }} py-2" href="/">
      <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
      <span>Dashboard</span></a
    >
  </li>

  <!-- Heading -->
  <div class="nav-heading text-dark mx-3">Master Data</div>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('*') ? 'active' : '' }} py-2" href="">
      <span>Product Items</span></a
    >
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('*') ? 'active' : '' }} py-2" href="">
      <span>Product Category</span></a
    >
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('*') ? 'active' : '' }} py-2" href="">
      <span>Sub Product Category</span></a
    >
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('*') ? 'active' : '' }} py-2" href="">
      <span>Product UOM</span></a
    >
  </li>

  <!-- Heading -->
  <div class="nav-heading text-dark mx-3">Warehouse</div>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('*') ? 'active' : '' }} py-2" href="">
      <span>Stock In</span></a
    >
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link {{ Request::is('*') ? 'active' : '' }} py-2" href="">
      <span>Stock Out</span></a
    >
  </li>

  <!-- Report -->
  <div class="nav-heading text-dark mx-3">Report</div>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link py-2" href="#">
      <span>Report Stock In</span></a
    >
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link py-2" href="#">
      <span>Report Stock Out</span></a
    >
  </li>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->