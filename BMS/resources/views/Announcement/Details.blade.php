@extends('Main')
@section('body')
	<div style="display: flex; align-items: center; flex-wrap: wrap;">
		<img src="/image/announcement.png">
		<div style="padding: 20px;">
			<h3 style="color: crimson">{{ $announcement->building->name }}</h3>
			<b>{{ $announcement->title }}</b><br>
			<p>{{ $announcement->ddate }}</p>
		</div>
	</div>

	<div class="house" style="display: flex;  flex-direction: column;">
		<div class="card-body" style="width: 100%;">
			<p class="card-text">{{ $announcement->description }}</p>
		</div>
	</div>
	<div style="display: flex;  justify-content: flex-end;  width: 100%; padding-top:20px;">
		<a href="/Announcement/List/{{ $announcement->building->id }}"><img src="/image/back.png"></a>
	</div>
@endsection
