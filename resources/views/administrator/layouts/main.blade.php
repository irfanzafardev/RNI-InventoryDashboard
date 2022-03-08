<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>
		<meta name="description" content="" />
		<meta name="author" content="" />
    <link rel="icon" href="{{ URL::asset('logo.png') }}" type="image/x-icon"/>

		<title>Inventory Dashboard</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

		<!-- Custom fonts for this template-->
		<link
			href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"
			rel="stylesheet"
			type="text/css"
		/>
		<link
			href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet"
		/>

		<!-- Custom styles for this template-->
    <link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
			crossorigin="anonymous"
		/>
		<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/extended-style.css') }}" rel="stylesheet" />
		<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>

    <!-- jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	</head>

	<body id="page-top">
		<!-- Page Wrapper -->
		<div id="wrapper">
      @include('administrator.partials.sidebar')

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">
				<!-- Main Content -->
				<div id="content">
          @include('administrator.partials.topbar')

					<!-- Begin Page Content -->
					<div class="container-fluid">
					@yield('container')
          </div>
					<!-- /.container-fluid -->
				</div>
				<!-- End of Main Content -->

				<!-- Footer -->
				<footer class="sticky-footer">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; IT RNI 2022</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->
			</div>
			<!-- End of Content Wrapper -->
		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Logout Modal-->
		<div
			class="modal fade"
			id="logoutModal"
			tabindex="-1"
			role="dialog"
			aria-labelledby="exampleModalLabel"
			aria-hidden="true"
		>
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button
							class="close"
							type="button"
							data-dismiss="modal"
							aria-label="Close"
						>
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						Select "Logout" below if you are ready to end your current session.
					</div>
					<div class="modal-footer">
						<button
							class="btn btn-secondary"
							type="button"
							data-dismiss="modal"
						>
							Cancel
						</button>
						<a class="btn btn-primary" href="login.html">Logout</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

		<!-- Bootstrap core JavaScript-->
		<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

		<!-- Core plugin JavaScript-->
		<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

		<!-- Custom scripts for all pages-->
		<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

		<!-- Page level plugins -->
		<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
		<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

		<!-- Page level custom scripts -->
		<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
		<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
		<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

    <!--  Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</body>
</html>
