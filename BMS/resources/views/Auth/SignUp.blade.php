@extends('Main')
@section('body')
	<div class="house">
		<div style="padding: 30px;">
			<form action="/Auth/SignUp_Submit">
				<div class="mb-3">
					<label class="form-label">Email address</label>
					<input type="email" class="form-control" aria-describedby="emailHelp" name="username">
					<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
				</div>

				<div class="mb-3">
					<label class="form-label">Password</label>
					<input type="password" class="form-control" name="password" value={{ old('password') }}>
				</div>

				<div class="mb-3">
					<label class="form-label">Name</label>
					<input type="name" class="form-control" name="name" value={{ old('name') }}>
				</div>

				<div class="mb-3">
					<label class="form-label">Family</label>
					<input type="name" class="form-control" name="family" value={{ old('family') }}>
				</div>

				<div class="mb-3">
					<label class="form-label">Phone Number</label>
					<input type="number" class="form-control" name="phonenumber" value={{ old('phonenumber') }}>
				</div>

				<div class="mb-3">
					<label class="form-label">Persons Number</label>
					<input type="number" class="form-control" name="persons" value={{ old('persons') }}>
				</div>

				<div style="padding-top:20px; display: flex; justify-content: center">
					<button type="submit" class="btn btn-primary"
						style="background-color: white; color:green;  width:120px; border-radius:20px;margin:15px">
						<h4 class="card-text" style="color: blue;"><i class="fa-solid fa-folder-plus"></i> Signup</h4>
					</button>
					<a href="/" class="btn btn-danger"
						style="background-color: white; color:red;  width:120px; border-radius: 20px; margin:15px">
						<h4 class="card-text" style="color: red;"><i class="fa-solid fa-rectangle-xmark"></i> Cancel</h4>
					</a>
				</div>
			</form>
		</div>
	</div>
@endsection
