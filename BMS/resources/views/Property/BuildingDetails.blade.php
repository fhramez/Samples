@extends('Main')
@section('body')
	<div style="display: flex; flex-direction: column; align-items: flex-start;">
		<div style="display: flex; align-items: center; padding-bottom: 20px;">
			<img src="/image/Home-big.png">
			<div style="padding: 20px 0px 20px 0px;">
				<a href="/Building/Edit/{{ $building->id }}" class="btn" style="color: blue;">
					<div style="display: flex; align-items: flex-start; align-items: center;">
						<i class="fa-solid fa-pen-to-square fa-2xl" style="padding-right:10px;"></i>
						Edit
					</div>
				</a><br>
				<div style="padding-bottom:12px;""></div>
				<a href="/Building/Delete/{{ $building->id }}" class="btn" style="color:red;">
					<div style="display: flex; align-items: flex-start; align-items: center;">
						<i class="fa-solid fa-trash-can fa-2xl" style="padding-right:10px;"></i>
						Delete
					</div>
				</a></br>
			</div>
		</div>

		<div class="house">
			<div class="card-body" style="display: flex;  flex-direction: column;">
				<div style="display: flex;  flex-direction: row;  justify-content: space-between;  align-items: flex-start;">
					<div>
						<h3 style="color: crimson">{{ $building->name }}</h3>
						<table>
							<tr>
								<td width=200px>
									<p class="card-text">Building ID:</p>
								</td>
								<td>
									<p class="card-text">{{ $building->id }}</p>
								</td>
							</tr>
							<tr>
								<td>
									<p class="card-text">Address:</p>
								</td>
								<td>
									<p class="card-text">{{ $building->address }}</p>
								</td>
							</tr>
							<tr>
								<td>
									<p class="card-text">Number of Floors:</p>
								</td>
								<td>
									<p class="card-text">{{ $building->nFloors }}</p>
								</td>
							</tr>
							<tr>
								<td>
									<p class="card-text">Number of Units:</p>
								</td>
								<td>
									<p class="card-text">{{ $building->nUnits }}</p>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div style="padding: 10px 20px 10px 20px;">
					<hr>
				</div>
				<table>
					<tr>
						<td style="height: 72px; text-align: center;">
							<a href="/Apartment/List/{{ $building->id }}">
								<img src="/image/apartment00.png">
							</a>
						</td>
						<td>
							<a href="/Apartment/List/{{ $building->id }}">
								Apartments
							</a>
						</td>
					</tr>
					<tr>
						<td style="height: 72px; text-align: center;">
							<a href="/Announcement/List/{{ $building->id }}">
								<img src="/image/announce.png">
							</a>
						</td>
						<td>
							<a href="/Announcement/List/{{ $building->id }}">
								Announcements
							</a>
						</td>
					</tr>
					<tr>
						<td style="width: 100px; height: 72px; text-align: center;">
							<a href="/Transaction/List/{{ $building->id }}">
								<img src="/image/transaction.png" style="width: 72px;">
							</a>
						</td>
						<td>
							<a href="/Transaction/List/{{ $building->id }}">
								Transactions
							</a>
						</td>
					</tr>
					<tr>
						<td style="height: 72px; text-align: center;">
							<a href="/Building/Manager/List/{{ $building->id }}">
								<img src="/image/User.png">
							</a>
						</td>
						<td>
							<a href="/Building/Manager/List/{{ $building->id }}">
								Managers
							</a>
						</td>
					</tr>
				</table>
				<div style="display: flex;  justify-content: flex-end;  width: 100%;">
					<a href="/Property/List"><img src="/image/back.png"></a>
				</div>
			</div>
		</div>
	</div>
@endsection
