<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{ url('img/icons/icon-48x48.png') }}" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

	<title>Sign Up | AdminKit Demo</title>

	<link href="{{ url('css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Get started</h1>
							<p class="lead">
								Start creating the best possible user experience for you customers.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="role" value="driver">
                                        <input type="hidden" name="company_name" value="">
										{{-- <div class="mb-3">
											<label class="form-label">Name</label>
											<input class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name" />
										</div> --}}
										<div class="mb-3">
											<label class="form-label">Company ID</label>
											<input class="form-control @error('company_id') is-invalid @enderror form-control-lg" type="text" name="company_id" placeholder="Enter your company id" />
										</div>
										<div class="mb-3">
											<label class="form-label">Name</label>
											<input class="form-control @error('name') is-invalid @enderror form-control-lg" type="text" name="name" placeholder="Enter your name" />
										</div>
										<div class="mb-3">
											<label class="form-label">Age</label>
											<input class="form-control @error('age') is-invalid @enderror form-control-lg" type="number" name="age" placeholder="Enter your age" />
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control @error('email') is-invalid @enderror form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Phone</label>
											<input class="form-control @error('phone') is-invalid @enderror form-control-lg" type="number" name="phone" placeholder="Enter your phone" />
										</div>
										<div class="mb-3">
											<label class="form-label">Address</label>
											<input class="form-control @error('address') is-invalid @enderror form-control-lg" type="text" name="address" placeholder="Enter your address" />
										</div>
										<div class="mb-3">
											<label class="form-label">License</label>
											<input class="form-control @error('license') is-invalid @enderror form-control-lg" type="text" name="license" placeholder="Enter your license number" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control @error('password') is-invalid @enderror form-control-lg" type="password" name="password" placeholder="Enter password" />
										</div>
										<div class="mb-3">
											<label class="form-label">Confirm Password</label>
											<input class="form-control @error('password_confirmation') is-invalid @enderror form-control-lg" type="password" name="password_confirmation" placeholder="Enter confirm password" />
										</div>
                                        <div>
                                            <span class="form-check-label">
                                                Already user ?
                                            </span>
                                            <a href="{{ route('login') }}">Login here</a>
                                        </div>
										<div class="text-center mt-3">
											{{-- <a href="index.html" class="btn btn-lg btn-primary">Sign up</a> --}}
											<button type="submit" class="btn btn-lg btn-primary">Sign up</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>
