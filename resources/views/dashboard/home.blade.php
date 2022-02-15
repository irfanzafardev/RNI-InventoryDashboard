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
		<link
			href="vendor/datatables/dataTables.bootstrap4.min.css"
			rel="stylesheet"
		/>
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
				<!-- Page Heading -->
				<div class="page-heading d-sm-flex align-items-center justify-content-between mb-4">
					<h1 class="h3 mb-0">Agroindustri</h1>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb bg-transparent pt-4">
							<li class="breadcrumb-item text-dark" aria-current="page">
								Inventory
							</li>
							<li class="breadcrumb-item text-dark active" aria-current="page">
								Agroindustri
							</li>
						</ol>
					</nav>
				</div>

				<ul class="nav time-nav">
					<li class="nav-item mr-3">
						<a
							class="nav-link active"
							aria-current="page"
							href="index-commercial.html"
							>Daily</a
						>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index-commercial-monthly.html">Monthly</a>
					</li>
				</ul>

				<!-- Content Row -->
				<div class="content-cta mb-3">
					<form action="">
						<div class="row justify-content-end">
							<div class="col-6 d-flex justify-content-end">
								<input
									type="date"
									class="form-control mr-3"
									id="date"
									value="2022-02-01"
									style="max-width: 200px"
								/>
								<button type="submit" class="btn btn-primary bg-darkblue px-4">
									Show
								</button>
							</div>
						</div>
					</form>
				</div>

				<div class="content-cta d-none mb-3">
					<form action="">
						<div class="row justify-content-end">
							<div class="col-6 d-flex justify-content-end">
								<input
									type="month"
									class="form-control me-3"
									id="date"
									value="2022-02"
									style="max-width: 200px"
								/>
								<button type="submit" class="btn btn-primary bg-darkblue px-4">
									Show
								</button>
							</div>
						</div>
					</form>
				</div>

				<!-- Summary Row -->
				<div class="summary-card mb-4">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-12 col-md-6 col-lg-4 mb-5 mb-lg-1">
									<div class="row">
										<div class="col-12">
											<img src="./img/dollar-sign.png" alt="" />
											<h5 class="d-inline-block ps-2">Total Value</h5>
										</div>
									</div>
									<span>Rp 0</span>
								</div>
								<div class="col-12 col-md-6 col-lg-4 mb-5 mb-lg-1">
									<div class="row">
										<div class="col-12">
											<img src="./img/valued-item.png" alt="" />
											<h5 class="d-inline-block ps-2">
												Most Valued Item (Teh)
											</h5>
										</div>
									</div>
									<span>Rp 0</span>
								</div>
								<div class="col-12 col-md-6 col-lg-4 mb-5 mb-lg-1">
									<div class="row">
										<div class="col-12">
											<img src="./img/items.png" alt="" />
											<h5 class="d-inline-block ps-2">
												Total Product Categories
											</h5>
										</div>
									</div>
									<span>0 items</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Single Card Row -->
				<div class="single-cards row">
					<div class="col-12 col-md-6 col-lg-4 mb-3">
						<a href="category-page.html" class="text-decoration-none">
							<div class="card single-card">
								<div class="card-body">
									<div class="row">
										<div class="col-6">
											<h5 class="card-title item-card-title text-white">
												Gula
											</h5>
											<p
												class="card-subtitle item-card-subtitle mb-2 text-white"
											>
												0 <br />
												<span>(kg)</span>
											</p>
										</div>
										<div class="col-6">
											<div class="donut-chart d-flex justify-content-end pe-3">
												<canvas id="ChartGula"></canvas>
											</div>
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-12 item-card-value text-white">
											Rp. 0
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-4 item-card-company text-white">
											Company
										</div>
										<div class="col-4 item-card-company text-white">Stock</div>
										<div class="col-4 item-card-company text-white">Value</div>
									</div>
									<div class="card-info">
										<div class="row">
											<div class="col-4 item-card-info text-white">
												PG Rajawali
											</div>
											<div class="col-4 item-card-info text-white">0</div>
											<div class="col-4 item-card-info text-white">
												0
											</div>
										</div>
										<div class="row">
											<div class="col-4 item-card-info text-white">
												PG Candi B
											</div>
											<div class="col-4 item-card-info text-white">0</div>
											<div class="col-4 item-card-info text-white">
												0
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-12 col-md-6 col-lg-4 mb-3">
						<a href="category-page.html" class="text-decoration-none">
							<div class="card single-card">
								<div class="card-body">
									<div class="row">
										<div class="col-6">
											<h5 class="card-title item-card-title text-white">
												Tetes
											</h5>
											<p
												class="card-subtitle item-card-subtitle mb-2 text-white"
											>
                      0 <br />
												<span>(kg)</span>
											</p>
										</div>
										<div class="col-6">
											<div class="donut-chart d-flex justify-content-end pe-3">
												<canvas id="ChartTetes"></canvas>
											</div>
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-12 item-card-value text-white">
											Rp. 0
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-4 item-card-company text-white">
											Company
										</div>
										<div class="col-4 item-card-company text-white">Stock</div>
										<div class="col-4 item-card-company text-white">Value</div>
									</div>
									<div class="row">
										<div class="col-4 item-card-info text-white">
											PG Krebet baru I
										</div>
										<div class="col-4 item-card-info text-white">0</div>
										<div class="col-4 item-card-info text-white">0</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-12 col-md-6 col-lg-4 mb-3">
						<a href="category-page.html" class="text-decoration-none">
							<div class="card single-card">
								<div class="card-body">
									<div class="row">
										<div class="col-6">
											<h5 class="card-title item-card-title text-white">Teh</h5>
											<p
												class="card-subtitle item-card-subtitle mb-2 text-white"
											>
                        0 <br />
												<span>(kg)</span>
											</p>
										</div>
										<div class="col-6">
											<div class="donut-chart d-flex justify-content-end pe-3">
												<canvas id="ChartTeh"></canvas>
											</div>
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-12 item-card-value text-white">
											Rp. 0
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-4 item-card-company text-white">
											Company
										</div>
										<div class="col-4 item-card-company text-white">Stock</div>
										<div class="col-4 item-card-company text-white">Value</div>
									</div>
									<div class="row">
										<div class="col-4 item-card-info text-white">
											PT Mitra Kerinci
										</div>
										<div class="col-4 item-card-info text-white">0</div>
										<div class="col-4 item-card-info text-white">0</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-12 col-md-6 col-lg-4 mb-3">
						<a href="category-page.html" class="text-decoration-none">
							<div class="card single-card">
								<div class="card-body">
									<div class="row">
										<div class="col-6">
											<h5 class="card-title item-card-title text-white">
												Sawit
											</h5>
											<p
												class="card-subtitle item-card-subtitle mb-2 text-white"
											>
												0 <br />
												<span>(kg)</span>
											</p>
										</div>
										<div class="col-6">
											<div class="donut-chart d-flex justify-content-end pe-3">
												<canvas id="ChartSawit"></canvas>
											</div>
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-12 item-card-value text-white">Rp. 0</div>
									</div>
									<div class="row mt-2">
										<div class="col-4 item-card-company text-white">
											Company
										</div>
										<div class="col-4 item-card-company text-white">Stock</div>
										<div class="col-4 item-card-company text-white">Value</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-12 col-md-6 col-lg-4 mb-3">
						<a href="category-page.html" class="text-decoration-none">
							<div class="card single-card">
								<div class="card-body">
									<div class="row">
										<div class="col-6">
											<h5 class="card-title item-card-title text-white">
												Karet
											</h5>
											<p
												class="card-subtitle item-card-subtitle mb-2 text-white"
											>
												0 <br />
												<span>(kg)</span>
											</p>
										</div>
										<div class="col-6">
											<div class="donut-chart d-flex justify-content-end pe-3">
												<canvas id="ChartKaret"></canvas>
											</div>
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-12 item-card-value text-white">Rp. 0</div>
									</div>
									<div class="row mt-2">
										<div class="col-4 item-card-company text-white">
											Company
										</div>
										<div class="col-4 item-card-company text-white">Stock</div>
										<div class="col-4 item-card-company text-white">Value</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>

				<!-- DataTales Today's input -->
				<div class="card my-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-dark">Today's input</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table
								class="table table-bordered"
								id="dataTable"
								width="100%"
								cellspacing="0"
							>
								<thead>
									<tr>
										<th>No</th>
										<th>Company</th>
										<th>Category</th>
										<th>Sub Category</th>
										<th>Product Name</th>
										<th>UOM</th>
										<th>Date & Time</th>
										<th>Qty</th>
										<th>Unit Price (Rp)</th>
										<th>Value (Rp)</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Company</th>
										<th>Category</th>
										<th>Sub Category</th>
										<th>Product Name</th>
										<th>UOM</th>
										<th>Date & Time</th>
										<th>Qty</th>
										<th>Unit Price (Rp)</th>
										<th>Value (Rp)</th>
									</tr>
								</tfoot>
								<tbody>
                  @foreach ($dataproduct as $product)
									<tr>
										<td>{{ $loop->iteration }}</td>
                    <td>{{ $product->user->company }}</td>
                    <td>{{ $product->subcategory->category->category_name }}</td>
                    <td>{{ $product->subcategory->subcategory_name }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->unit->unit_symbol}}</td>
                    <td>{{ $product->updated_at->diffForHumans() }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->unit_price }}</td>
                    <td>{{ $product->value }}</td>
									</tr>
                      
                  @endforeach
									{{-- <tr>
										<td>2</td>
										<td>PT PG Candi Baru</td>
										<td>Gula</td>
										<td>Gula Bulk</td>
										<td>GULA BULK (PG SHS)</td>
										<td>KG</td>
										<td>2022-02-08 07:16:05</td>
										<td>1606</td>
										<td>10850</td>
										<td>17425100</td>
									</tr>
									<tr>
										<td>3</td>
										<td>PG Krebet baru I</td>
										<td>Tetes</td>
										<td>Tetes</td>
										<td>TETES - PG KBB</td>
										<td>KG</td>
										<td>2022-02-08 07:16:05</td>

										<td>7027</td>
										<td>2114</td>
										<td>14950208</td>
									</tr>
									<tr>
										<td>4</td>
										<td>PT Mitra Kerinci</td>
										<td>Teh</td>
										<td>Teh Hijau</td>
										<td>Teh Hijau</td>
										<td>KG</td>
										<td>2022-02-08 07:16:05</td>

										<td>19210</td>
										<td>1719</td>
										<td>3302990</td>
									</tr>
									<tr>
										<td>5</td>
										<td>PT Mitra Kerinci</td>
										<td>Teh</td>
										<td>Teh Hitam</td>
										<td>Teh Hitam</td>
										<td>KG</td>
										<td>2022-02-08 07:16:05</td>

										<td>17000</td>
										<td>9517</td>
										<td>161789000</td>
									</tr>
									<tr>
										<td>6</td>
										<td>PT Mitra Kerinci</td>
										<td>Teh</td>
										<td>Teh Spesial</td>
										<td>Teh Spesial</td>
										<td>KG</td>
										<td>2022-02-08 07:16:05</td>

										<td>389,9</td>
										<td>37840</td>
										<td>14753816</td>
									</tr>
									<tr>
										<td>7</td>
										<td>PG Krebet baru I</td>
										<td>Tetes</td>
										<td>Tetes Tebu</td>
										<td>TETES - PG KBB</td>
										<td>KG</td>
										<td>2022-02-08 07:16:05</td>

										<td>7027</td>
										<td>211492</td>
										<td>14950208</td>
									</tr>
									<tr>
										<td>8</td>
										<td>PT PG Rajawali I</td>
										<td>Tetes</td>
										<td>Tetes Tebu</td>
										<td>TETES - PG RA</td>
										<td>KG</td>
										<td>2022-02-08 07:16:05</td>
										<td>2911504</td>
										<td>2278</td>
										<td>6632406016</td>
									</tr> --}}
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>

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
	</body>
</html>
