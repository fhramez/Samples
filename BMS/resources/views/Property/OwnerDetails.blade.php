@extends('Main')
@section('body')
	<div style="display: flex; align-items: center; padding-bottom: 20px; flex-wrap: wrap;">
		<img src="/image/apartment.png" style="width: 200px;">
		<div style="padding: 20px 0px 20px 0px;">
			<h3 style="color: crimson">{{ $apartment->building->name }} </h3>
			Unit {{ $apartment->unit_number }} / Floor {{ $apartment->floor }}<br>
			ID: {{ $apartment->id }}<br>
			{{ $apartment->description }}
		</div>
	</div>

	<div class="house">
		<div class="card-body" style="display: flex;  flex-direction: column;">
			<table>
				<tr>
					<td style="height: 72px; text-align: center;">
						<a href="/Announcement/List/{{ $apartment->building->id }}">
							<img src="/image/announce.png">
						</a>
					</td>
					<td>
						<a href="/Announcement/List/{{ $apartment->building->id }}">
							Announcements
						</a>
					</td>
				</tr>

				<tr>
					<td style="height: 72px; text-align: center;">
						<a href="/Transaction/List/{{ $apartment->building->id }}">
							<img src="/image/transaction.png">
						</a>
					</td>
					<td>
						<a href="/Transaction/List/{{ $apartment->building->id }}">
							Transactions
						</a>
					</td>
				</tr>
				<tr>
					<td style="height: 72px; text-align: center;">
						<a href="/Announcement/List/{{ $apartment->building->id }}">
							<img src="/image/in .png">
						</a>
					</td>
					<td>
						<a href="/Invoice/List/{{ $apartment->id }}">
							Invoices
						</a>
					</td>
				</tr>
				<tr>
					<td style="height: 72px; text-align: center;">
						<a href="/Apartment/List/{{ $apartment->building->id }}">
							<img src="/image/apartment00.png">
						</a>
					</td>
					<td>
						<a href="/Apartment/List/{{ $apartment->building->id }}">
							Other Apartments
						</a>
					</td>
				</tr>
				<tr>
					<td style="width: 100px; height: 72px; text-align: center;">
						<a href="/Apartment/Edit/{{ $apartment->id }}">
							<img src="/image/apartmentedit.png" style="width: 72px;">
						</a>
					</td>
					<td>
						<a href="/Apartment/Edit/{{ $apartment->id }}">
							Edit Apartment
						</a>
					</td>
				</tr>
				<tr>
					<td style="height: 72px; text-align: center;">
						<a href="/Apartment/Delete/{{ $apartment->id }}">
							<img src="/image/apartmentdelete.png">
						</a>
					</td>
					<td>
						<a href="/Apartment/Delete/{{ $apartment->id }}">
							Delete Apartment
						</a>
					</td>
				</tr>
			</table>
		</div>
	</div>

	<div style="display: flex;  justify-content: flex-end;  width: 100%;">
		<a href="/Property/BuildingDetails/{{ $apartment->building->id }}"><img src="/image/back.png"></a>
	</div>
@endsection
