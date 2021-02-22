<!DOCTYPE=html>
<html>

@extends('layouts.appmaster')

	@section('title', 'Login Page')
	<head>
		<title> User Login </title>
	</head>

	<body>
		<div>
		
			@section('content')
			<form action="doLogin" method="post">
				{{csrf_field()}}
				
				<!-- Begin Demo Table -->
				<div class="demo-table">
					<div class="form=head">Login</div>
					<!-- Begin Username -->
					<div class="field-column">
						<div>
							<label for="username">Username</label><span id="user_info" class="error-info"></span>
						</div>
						<div>
							<input name="user_name" id="user_name" type="text" class="demo-input-box">
						</div>
					</div>
					<!-- End Username -->
					<!-- Begin Password -->
					<div class="field-column">
						<div>
							<label for="password">Password</label><span id="password_info" class="error-info"></span>
						</div>
						<div>
							<input name="password" id="password" type="text" class="demo-input-box">
						</div>
					</div>
					<!-- End Password -->
				</div>
				<!-- End Demo Table -->
				<div class="field-column">
					<input type="submit" class="btnLogin">
				</div>
			</form>
			@endsection
		</div>
	</body>
</html>