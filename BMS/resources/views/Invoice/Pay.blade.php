@extends('Main')
@section('body')
	<div style="display: flex; align-items: center; padding-bottom: 20px; flex-wrap: wrap;">
		<img src="/image/peyment-big.png">
		<div style="padding: 20px;">
			<h3 style="color: crimson">{{ $invoice->apartment->building->name }} / Unit
				{{ $invoice->apartment->unit_number }}
			</h3>
			<p>Peyment</p>
		</div>
	</div>
	<div class="house">
		<div class="card-body" style="display: flex;  flex-direction: column;">
			<div style="display: flex;  flex-direction: row;  justify-content: space-between;  align-items: flex-start;">
				<div>
					<form action="/Invoice/PeymentDone/{{ $invoice->id }}">
						<table>
							<tr>
								<td width=200px>
									<p class="card-text">ID:</p>
								</td>
								<td>
									<p class="card-text">{{ $invoice->id }}</p>
								</td>
							</tr>
							<tr>
								<td>
									<p class="card-text">Title:</p>
								</td>
								<td>
									<p class="card-text">{{ $invoice->transaction->title }}</p>
								</td>
							</tr>
							<tr>
								<td>
									<p class="card-text">Amount:</p>
								</td>
								<td>
									<p class="card-text">{{ $invoice->amount }}</p>
								</td>
							</tr>
							<tr>
								<td>
									<p class="card-text">Division Type :</p>
								</td>
								<td>
									<p class="card-text">{{ $invoice->transaction->division_type }}</p>
								</td>
							</tr>
							<tr>
								<td>
									<p class="card-text">Date :</p>
								</td>
								<td>
									<p class="card-text">{{ $invoice->created_at }}</p>
								</td>
							</tr>
							{{-- <span class="input-group-text" style="width: 120px;">Description</span>
							<input type="text" label="desc" class="form-control" id="description" name="description"
								style="width: 150px;" value="{{ old('description') }}"> --}}
						</table>
						<hr>
				</div>
			</div>
			<div style="display: flex; align-items: flex-start; align-items: center;">
				<button type="submit"class="btn" id="submit">
					<i class="fa-regular fa-credit-card fa-2xl"style="color: blue; padding-right:5px"></i>Payment Done
		        </button>
			</div>

		</div>
	</div>
@endsection
