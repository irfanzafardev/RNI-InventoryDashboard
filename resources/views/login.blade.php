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

		<title>Login</title>

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
		<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/extended-style.css') }}" rel="stylesheet" />
	</head>

	<body class="bg-light">
		<div class="container">
			<!-- Outer Row -->
			<div class="row login-box justify-content-center">
				<div class="col-xl-12 col-lg-12 col-md-9">
					<div class="inner-login-box card o-hidden border-0 shadow-lg my-5">
						<div class="card-body p-0">
							<!-- Nested Row within Card Body -->
							<div class="row">
								<div class="col-lg-6 d-none bg-white d-lg-flex align-items-center justify-content-center">
									<div class="d-flex align-items-center justify-content-center">
										<img src="./img/ic/login-logo.png" alt="" width="360px" />
									</div>
								</div>
								<div class="col-lg-6">
									<div class="p-5">
										<div class="text-dark">
											<h1 class="h4 mb-4">Log in</h1>
										</div>
                    @if (session()->has('loginError'))
                      <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('loginError') }}
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                      </div>
                    @endif
										<form action="/" method="post" class="user">
                      @csrf
											<div class="form-group">
												<label for="email">Email</label>
												<input
													type="email"
													class="form-control @error('email') is-invalid @enderror"
													id="email"
                          name="email"
													placeholder="Enter your Email"
                          value="{{ old('email') }}"
                          autofocus
                          required
												/>
                        @error('email')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
											</div>
											<div class="form-group">
												<label for="password">Password</label>
												<input
													type="password"
													class="form-control  @error('password') is-invalid @enderror"
													id="password"
                          name="password"
													placeholder="Enter your Password"
                          required
												/>
											</div>
											<a
												href="/administrator"
												class="btn btn-dark bg-darkblue btn-login btn-block"
											>
												Login
                    </a>
										</form>

										<div class="text-center mt-3">
											<p class="small">
												Silahkan hubungi Divisi IT RNI untuk informasi lebih
												lanjut
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="js/sb-admin-2.min.js"></script>
	</body>
</html>
