@extends('Main')

@section('body')
	<div style="display: flex; align-items: center; padding-bottom: 20px; flex-wrap: wrap;">
		<img src="/image/Details.png">
		<div style="padding: 20px;">
			<h3 style="color: crimson">{{ $transaction->building->name }}</h3>
			Transaction Detail<br><br>
			@if ($transaction->building->isManager())
				<a href="/Transaction/New/{{ $transaction->building->id }}" class="btn btn-primary"
					style="background-color: white; color:green;  width:120px; border-radius: 20px;">
					<h4 class="card-text" style="color: blue;"><i class="fa-solid fa-folder-plus"></i> Add</h4>
				</a>
			@endif
		</div>
	</div>
	{{-- @foreach ($transactionransactions as $t) --}}
	<div class="house">
		<div
			style="display: flex;  flex-direction: column; justify-content: flex-start;  align-items: left; width:100%; padding: 10px 10px;">
			<table>
				<tr>
					<td style="width: 80px;">
						<img src="/image/title.png" width="72px">
					</td>
					<td width=450px>
						<p class="card-text"><b>Title:</b><br>{{ $transaction->title }}</p>
					</td>
				</tr>

				<tr>
					<td style="width: 120px;">
						<img src="/image/amount.png" width="72px">
					</td>
					<td width=150px>
						<p class="card-text"><b>Amount:</b><br>
							{{ $transaction->amount }}</p>
					</td>
				</tr>

				<tr>
					<td style="width: 80px;">
						<img src="/image/type1.png" width="72px">
					</td>
					<td width=150px>
						<p class="card-text"><b>Type:</b><br>
							{{ $transaction->type }}</p>
					</td>
				</tr>

				<tr>
					<td style="width: 80px;">
						<img src="/image/numbers.png" width="72px">
					</td>
					<td>
						<p class="card-text">
							{{-- <b>Units:</b><br> --}}
							{{-- <div style="display: flex;  flex-direction: row;  flex-wrap: wrap;  align-items: center;"> --}}
							@foreach ($transaction->apartments as $a)
								{{-- <div style="padding-right: 10px; margin-right: 5px;"> --}}
								Unit {{ $a->unit_number }}<br>
								{{-- </div> --}}
							@endforeach
						</p>
						{{-- </div> --}}
					</td>

				</tr>

				<tr>
					<td style="width: 80px;">
						<img src="/image/invoice.png" width="72px">
					</td>
					<td>
						<p class="card-text">
							{{-- <div style="display: flex;  flex-direction: row;  flex-wrap: wrap;  align-items: center;"> --}}
							@foreach ($transaction->invoices as $i)
								{{-- <div style="padding-right: 10px; margin-right: 5px;"> --}}
								Unit {{ $i->apartment->unit_number }}: {{ $i->amount }}<br>
								{{-- </div> --}}
							@endforeach
							{{-- </div> --}}
						</p>
					</td>

				</tr>

				<tr>
					<td style="width: 80px;">
						<img src="/image/division.jpg" width="72px">
					</td>
					<td width=150px>
						<p class="card-text"><b>Division Type:</b><br>
							{{ $transaction->division_type }}</p>
					</td>
				</tr>

				<tr>
					<td style="width: 50px;">
						<img src="/image/relation.png" width="72px">
					</td>
					<td width=150px>
						<p class="card-text"><b>Related To:</b><br>
							{{ $transaction->related_to }}</p>
					</td>
				</tr>

				<tr>
					<td style="width: 50px;">
						<img src="/image/description.png" width="72px">
					</td>
					<td width=150px>
						<p class="card-text"><b>Description:</b><br>
							{{ $transaction->description }}</p>
					</td>
				</tr>
			</table>
			@if ($transaction->building->isManager())
				<hr>
				<div style="padding-left: 10px;">
					<a href="/Transaction/Edit/{{ $transaction->id }}" class="btn" style="color: blue;">
						<div style="display: flex; align-items: flex-start; align-items: center;">
							<i class="fa-solid fa-pen-to-square fa-2xl" style="padding-right:10px;"></i>
							Edit
						</div>
					</a>
					<a href="/Transaction/Delete/{{ $transaction->id }}" class="btn" style="color:red;">
						<div style="display: flex; align-items: flex-start; align-items: center;">
							<i class="fa-solid fa-trash-can fa-2xl" style="padding-right:10px;"></i>
							Delete
						</div>
					</a></br>
				</div>
			@endif

		</div>
	</div>
	{{-- @endforeach --}}
	<div style="display: flex;  justify-content: flex-end;  width: 100%;">
		<a href="/Transaction/List/{{ $transaction->building->id }}"><img src="/image/back.png"></a>
	</div>
@endsection
