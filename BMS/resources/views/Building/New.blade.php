@extends('Main')
@section('body')
	<form class="house" id="Form4" action="/Building/New_Submit">
		<div class="containerasli editform">
			<div class="containr1">
				<div style="height: 20px;"></div>
				<div style="display: flex;  flex-direction: row; width:100%;">
					<img src="/image/name.png" style="padding-right: 5px;">
					<div style="display: flex;  flex-direction: column;  width:100%;">
						<span style="display: flex;  justify-content: flex-start; align-items: center; width:100%; color: lightslategray">
							Name
						</span>
						<input type="text" aria-label="last name" class="form-control" id="name" name="name" style="width:100%"
							value="{{ old('Name') }}">
					</div>
				</div>

				<div style="height: 20px;"></div>
				<div style="display: flex;  flex-direction: row; width:100%;">
					<img src="/image/address.png" style="padding-right: 5px;">
					<div style="display: flex;  flex-direction: column;  width:100%;">
						<span style="display: flex;  justify-content: flex-start; align-items: center; width:100%; color: lightslategray">
							Address
						</span>
						<input type="text" aria-label="last name" class="form-control" id="address" name="address" style="width:100%"
							value="{{ old('address') }}">
					</div>
				</div>
				<div style="height: 20px;"></div>
				<div style="display: flex; flex-direction: row; width:100%;">
					<img src="/image/Floor.png" style="padding-right: 5px;">
					<div style="display: flex;  flex-direction: column;  width:100%;">
						<span style="display: flex;  justify-content: flex-start; align-items: center; width:100%; color: lightslategray">
							Number Floor
						</span>
						<input type="text" aria-label="last name" class="form-control" id="nFloors" name="nFloors"
							style="width: 100%;" value="{{ old('nFloors') }}">
					</div>
				</div>
				<div style="height: 20px;"></div>
				<div style="display: flex; flex-direction: row; width:100%;">
					<img src="/image/numbers.png" style="padding-right: 5px;">
					<div style="display: flex;  flex-direction: column;  width:100%;">
						<span style="display: flex;  justify-content: flex-start; align-items: center; width:100%; color: lightslategray">
							Number Unit
						</span>
						<input type="text" aria-label="last name" class="form-control" id="nUnits" name="nUnits"
							style="width: 100%;" value="{{ old('nUnits') }}">
					</div>
				</div>
				<div style="height: 20px;"></div>
				<div style="display: flex; flex-direction: row; width:100%;">
					<img src="/image/description.png" style="padding-right: 5px;">
					<div style="display: flex;  flex-direction: column;  width:100%;">
						<span style="display: flex;  justify-content: flex-start; align-items: center; width:100%; color: lightslategray">
							Description
						</span>
						<input type="text" aria-label="last name" class="form-control" id="description" name="description"
							style="width: 100%;" value="{{ old('description') }}">
					</div>
				</div>

				<div style="padding-top:40px; display: flex; justify-content: center">
					<button type="submit" class="btn btn-primary"
						style="background-color: white; color:green;  width:120px; border-radius:20px;margin:15px">
						<h4 class="card-text" style="color: blue;"><i class="fa-solid fa-folder-plus"></i> Add</h4>
					</button>
					<a href="/Property/List" class="btn btn-danger"
						style="background-color: white; color:red;  width:120px; border-radius: 20px; margin:15px">
						<h4 class="card-text" style="color: red;"><i class="fa-solid fa-rectangle-xmark"></i> Cancel</h4>
					</a>
				</div>
			</div>
		</div>
	</form>
@endsection
