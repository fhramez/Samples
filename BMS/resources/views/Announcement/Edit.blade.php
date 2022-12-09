@extends('Main')
@section('body')
	<form class="house" id="Form4" action="/Announcement/Edit_Submit/{{ $announcement->id }}">
		<div class="containerasli editform">
			<div class="containr1">
				<div style="height: 20px;"></div>
				<div style="display: flex;  flex-direction: row; width:100%;">
					<img src="/image/title.png" style="padding-right: 5px;">
					<div style="display: flex;  flex-direction: column;  width:100%;">
						<span style="display: flex;  justify-content: flex-start; align-items: center; width:100%; color: lightslategray">
							Title
						</span>
						<input type="text" aria-label="last name" class="form-control" id="title" name="title"
							style="width: 100%;"" value="{{ $announcement->title }}">
					</div>
				</div>

				<div style="height: 20px;"></div>
				<div style="display: flex;  flex-direction: row; width:100%;">
					<img src="/image/description.png" style="padding-right: 5px;">
					<div style="display: flex;  flex-direction: column;  width:100%;">
						<span style="display: flex;  justify-content: flex-start; align-items: center; width:100%;color: lightslategray">
							Description
						</span>
						<input type="text" aria-label="last name" class="form-control" id="floor" name="description"
							style="width: 100%;" value="{{ $announcement->description }}">
					</div>
				</div>
				<div style="padding-top:40px; display: flex; justify-content: center">
					<button type="submit" class="btn btn-primary"
						style="background-color: white; color:green;  width:120px; border-radius:20px;margin:15px">
						<h4 class="card-text" style="color: blue;"><i class="fa-solid fa-pen-to-square"></i> Edit</h4>
					</button>
					<a href="/Announcement/List/{{ $announcement->building->id }}" class="btn btn-danger"
						style="background-color: white; color:red;  width:120px; border-radius: 20px; margin:15px">
						<h4 class="card-text" style="color: red;"><i class="fa-solid fa-rectangle-xmark"></i> Cancel</h4>
					</a>
					</button>
				</div>
			</div>
		</div>
	</form>

	{{-- <form class="table table-primary table-striped" id="Form4"
		action="/Announcement/Edit_Submit/{{ $announcement->id }}">
		<div class="containerasli" style="width:400px;">
			<div class="containr1">
				<div style="height: 20px;"></div>
				<div class="input-group">
					<span class="input-group-text" style="width:150px;">Title</span>
					<input type="text" aria-label="last name" class="form-control" id="title" name="title"
						style="width: 150px;" value="{{ $announcement->title }}">
				</div>

				<div style="height: 20px;"></div>
				<div class="input-group">
					<span class="input-group-text" style="width:150px;">Description</span>
					<input type="text" aria-label="last name" class="form-control" id="floor" name="description"
						style="width: 150px;" value="{{ $announcement->description }}">
				</div>

				<div id="bt" style="height: 50px;">
					<button type="submit" class="btn btn-primary" style="width: 120px;">Edit</button>
				</div>
				<div style="height: 20px;"></div>
			</div>
		</div>
	</form> --}}
@endsection
