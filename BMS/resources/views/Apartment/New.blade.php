@extends('Main')
@section('body')
	<form class="house" id="Form4" action="/Apartment/New_Submit">
		<div class="containerasli editform">
			<div class="containr1">
				<div style="height: 20px;"></div>
				<div style="display: flex;  flex-direction: row; width:100%;">
					<img src="/image/numbers.png" style="padding-right: 5px;">
					<div style="display: flex;  flex-direction: column;  width:100%;">
						<span style="display: flex;  justify-content: flex-start; align-items: center; width:100%; color: lightslategray">
							Unit Number
						</span>
						<input type="text" aria-label="last name" class="form-control" id="unit_number" name="unit_number"
							style="width: 100%;" value="{{ old('unit_number') }}">
					</div>
				</div>
				<div style="display: flex;  flex-direction: row; width:100%;">
					<img src="/image/area.png" style="padding-right: 5px;">
					<div style="display: flex;  flex-direction: column;  width:100%;">
						<span style="display: flex;  justify-content: flex-start; align-items: center; width:100%; color: lightslategray">
							Area
						</span>
						<input type="text" aria-label="last name" class="form-control" id="area" name="area"
							style="width: 100%;" value="{{ old('area') }}">
					</div>
				</div>

				<div style="display: flex;  flex-direction: row; width:100%;">
					<img src="/image/floor.png" style="padding-right: 5px;">
					<div style="display: flex;  flex-direction: column;  width:100%;">
						<span style="display: flex;  justify-content: flex-start; align-items: center; width:100%; color: lightslategray">
							Floor
						</span>
						<input type="text" aria-label="last name" class="form-control" id="floor" name="floor"
							style="width: 100%;" value="{{ old('floor') }}">
					</div>
				</div>

				<div style="display: flex;  flex-direction: row; width:100%;">
					<img src="/image/description.png" style="padding-right: 5px;">
					<div style="display: flex;  flex-direction: column;  width:100%;">
						<span style="display: flex;  justify-content: flex-start; align-items: center; width:100%; color: lightslategray">
							Description
						</span>
						<input type="text" aria-label="last name" class="form-control" id="description" name="description"
							style="width: 100%;" value="{{ old('description') }}">
					</div>
				</div>
				<div style="display: flex;  flex-direction: row; width:100%;">
					<img src="/image/id.png" style="padding-right: 5px;">
					<div style="display: flex;  flex-direction: column;  width:100%;">
						<span style="display: flex;  justify-content: flex-start; align-items: center; width:100%; color: lightslategray">
							Building ID
						</span>
						<input type="text" aria-label="last name" class="form-control" id="building_id" name="building_id"
							style="width: 100%;" value="{{ old('building_id') }}">
					</div>
				</div>
				<div style="display: flex;  flex-direction: row; width:100%;">
					<img src="/image/phone.png" style="padding-right: 5px;">
					<div style="display: flex;  flex-direction: column;  width:100%;">
						<span style="display: flex;  justify-content: flex-start; align-items: center; width:100%; color: lightslategray">
							Maneger PhoneNumber
						</span>
						<input type="text" aria-label="last name" class="form-control" id="phonenumber" name="phonenumber"
							style="width: 100%;" value="{{ old('phonenumber') }}">
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
