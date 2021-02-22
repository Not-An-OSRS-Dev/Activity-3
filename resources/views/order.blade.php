
<!DOCTYPE=html>
<html>

<head>
<title>User Login</title>
</head>

<body>
	<div>
		<form action="addorder" method="post">
			{{csrf_field()}}

			<!-- Begin Demo Table -->
			<div class="demo-table">
				<div class="form=head">Order Product</div>
				<!-- Begin Product -->
				<div class="field-column">
					<div>
						<label for="product">Product</label>
					</div>
					<div>
						<input name="product" id="product" type="text"
							class="demo-input-box">
					</div>
				</div>
				<!-- End Product -->
				<!-- Begin CustomerID -->
				<div class="field-column">
					<div>
						<input name="firstName" type="text" value="{{ Session::get('firstName') }}"
							class="demo-input-box">
					</div>
					<div>
						<input name="lastName" type="text" value="{{ Session::get('lastName') }}"
							class="demo-input-box">
					</div>
				</div>
				<!-- End CustomerID -->
			</div>
			<!-- End Demo Table -->
			<div class="field-column">
				<input type="submit" class="btnLogin">
			</div>
		</form>
	</div>
</body>
</html>