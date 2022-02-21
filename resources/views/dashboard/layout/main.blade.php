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

		<title>Dashboard - Home</title>

		<!-- Custom fonts for this template-->
		<link
			href="vendor/fontawesome-free/css/all.min.css"
			rel="stylesheet"
			type="text/css"
		/>
		<link
			href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet"
		/>

		<!-- Custom styles for this template-->
		<link href="css/sb-admin-2.min.css" rel="stylesheet" />
		<link href="css/extended-style.css" rel="stylesheet" />
		<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"/>
	</head>

	<body id="page-top">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
			<div class="container-fluid">
				<a class="navbar-brand" href="index-commercial.html">Dashventory</a>
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
				<div
					class="collapse navbar-collapse justify-content-between"
					id="navbarNav"
				>
					<ul class="navbar-nav">
						<li class="nav-item mb-2 mb-lg-0">
							<a class="nav-link active" aria-current="page" href="#"
								>Agroindustri</a
							>
						</li>
						<li class="nav-item mb-2 mb-lg-0">
							<a class="nav-link" href="#">Manufaktur</a>
						</li>
						<li class="nav-item mb-2 mb-lg-0">
							<a class="nav-link" href="#">Garam</a>
						</li>
						<li class="nav-item mb-2 mb-lg-0">
							<a class="nav-link" href="#">Peternakan</a>
						</li>
					</ul>
					<!-- Nav Item - User Information -->

					<a
						class="nav-link dropdown-toggle"
						href="#"
						id="userDropdown"
						role="button"
						data-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
						<span class="mr-2 d-none d-lg-inline text-dark">
              {{ Auth::user()->name }}
            </span>
						<img class="" src="img/user.png" width="25px" />
					</a>
					<!-- Dropdown - User Information -->
					<div
						class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
						aria-labelledby="userDropdown"
					>
          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-block">
              @csrf
          </form>
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
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="js/sb-admin-2.min.js"></script>

		<!-- Page level plugins -->
		<script src="vendor/chart.js/Chart.min.js"></script>
		<script src="vendor/datatables/jquery.dataTables.min.js"></script>
		<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

		<!-- Page level custom scripts -->
		<script src="js/demo/chart-area-demo.js"></script>
		<script src="js/demo/chart-pie-demo.js"></script>
		<script src="js/demo/datatables-demo.js"></script>

    <script>
      var tbody = document.getElementById("tbody");
      var sumVal = 0;

      for (var i = 1; i < tbody.rows.length; i++)
      {
        sumVal = sumVal + parseInt(tbody.rows[i].cells[10].innerHTML);
      }

      // Create our number formatter.
      var formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
      });

      document.getElementById('totalValue').innerHTML = formatter.format(sumVal);

			// var a = [];
			// for (var i = 1; i < tbody.rows.length; i++) {
			// 	a[i] = tbody.rows[i].cells[9].innerHTML;
			// }

			// a.filter((n) => n);

      // var qq = $("tr:contains('ASSP')");
      // console.log(qq.html());
    </script>
	</body>
</html>
