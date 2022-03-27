<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<meta name="description" content="" />
		<meta name="author" content="" />
    <link rel="icon" href="{{ URL::asset('logo.png') }}" type="image/x-icon"/>

		<title>Inventory Dashboard</title>

		<!-- Custom fonts for this template-->
		<link href="{{ asset("vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet" type="text/css"/>
    <link
    href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"
    rel="stylesheet"
    type="text/css"
    />
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"/>

		<!-- Custom styles for this template-->
		<link href="{{ asset("css/sb-admin-2.min.css") }}" rel="stylesheet" />
		<link href="{{ asset("css/extended-style.css") }}" rel="stylesheet" />
		<link href="{{ asset("vendor/datatables/dataTables.bootstrap4.min.css") }}" rel="stylesheet"/>

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script> --}}

    <script src="https://kit.fontawesome.com/55fc4a3228.js" crossorigin="anonymous"></script>

		<link
			href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css"
			rel="stylesheet"
		/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
		<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#datepicker").datepicker({
					dateFormat: 'yy-mm-dd',
          maxDate: -1,
				});
			});
		</script>
	</head>

	<body id="page-top">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
			<div class="container-fluid">
				<a class="navbar-brand" href="/dashboard">Dashventory</a>
				<button
					class="navbar-toggler"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#navbarNav"
					aria-controls="navbarNav"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-between" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item mb-2 mb-lg-0">
							<a class="nav-link {{ Request::is('dashboard/agroindustri*') ? 'active' : '' }}" aria-current="page" href="/dashboard/agroindustri">Agroindustri</a>
						</li>
						<li class="nav-item mb-2 mb-lg-0">
							<a class="nav-link {{ Request::is('dashboard/manufaktur*') ? 'active' : '' }}" href="/dashboard/manufaktur">Manufaktur</a>
						</li>
						<li class="nav-item mb-2 mb-lg-0">
							<a class="nav-link {{ Request::is('dashboard/garam*') ? 'active' : '' }}" href="/dashboard/garam">Garam</a>
						</li>
					</ul>


					<!-- Nav Item - User Information -->
          <div class="d-flex">
            <div class="text-dark pt-2 pr-4">
              {{ $today }}, {{ $now }}
            </div>
            <div class="dropdown">
              <button class="btn btn-link text-decoration-none dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-dark">
                  {{ Auth::user()->name }}
                </span>
                <img class="" src="{{ asset("img/user.png") }}" width="25px" />
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
        
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-block">
                        @csrf
                    </form>
                </li>
              </ul>
            </div>
          </div>
				</div>
			</div>
		</nav>

		<section class="main-content">
			<div class="container">
        @yield('container')


		<!-- Footer -->
		<footer class="sticky-footer bg-white">
			<div class="container my-auto">
				<div class="copyright text-center my-auto">
					<span>Copyright &copy; IT RNI 2022</span>
				</div>
			</div>
		</footer>
		<!-- End of Footer -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Bootstrap core JavaScript-->
		{{-- <script src="{{ asset("vendor/jquery/jquery.min.js") }}"></script> --}}
		<script src="{{ asset("vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>

		<!-- Core plugin JavaScript-->
		<script src="{{ asset("vendor/jquery-easing/jquery.easing.min.js") }}"></script>

		<!-- Custom scripts for all pages-->
		<script src="{{ asset("js/sb-admin-2.min.js") }}"></script>

		<!-- Page level plugins -->
		<script src="{{ asset("vendor/chart.js/Chart.min.js") }}"></script>
		<script src="{{ asset("vendor/datatables/jquery.dataTables.min.js") }}"></script>
		<script src="{{ asset("vendor/datatables/dataTables.bootstrap4.min.js") }}"></script>

		<!-- Page level custom scripts -->
		<script src="{{ asset("js/demo/chart-area-demo.js") }}"></script>
		<script src="{{ asset("js/demo/chart-pie-demo.js") }}"></script>
		<script src="{{ asset("js/demo/datatables-demo.js") }}"></script>
	</body>
</html>
