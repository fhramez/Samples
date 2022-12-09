@extends('Main')
@section('body')
	<div style="display: flex; align-items: center; padding-bottom: 50px; flex-wrap: wrap;">
		<img src="/image/invoice-big.png">
		<div style="padding: 20px;">
			<h3 style="color: crimson"> {{ $apartment->building->name }}</h3>
			Unit {{ $apartment->unit_number }}<br>
			Balance: {{ $sum_invoices - $sum_payments }}

		</div>
	</div>
	<div class="col-md-12">
		<div class="row">

			<div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
				<div class="row">

				</div>

				<div class="row">
					<div class="receipt-header">
						<div class="col">
							<h3>INVOICES </h3>
						</div>
					</div>
				</div>

				<div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="text-align: center">ID</th>
								<th style="text-align: center">Date</th>
								<th style="text-align: center">Title</th>
								<th style="text-align: center">Amount</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($invoices as $i)
								@if (($i->transaction->related_to == 'Living' && $i->apartment->living_id == Auth::user()->id) ||
								    ($i->transaction->related_to == 'Owner' && $i->apartment->owner_id == Auth::user()->id))
									<tr>
										<td class="col-md-2" style="text-align: center; vertical-align: middle;">
											<a href="/Transaction/Details/{{ $i->transaction->id }}"> {{ $i->transaction->id }}</a>
										</td>
										<td class="col-md-3" style="text-align: center; vertical-align: middle;">
											{{ date_format($i->created_at, 'Y-m-d') }}</td>
										<td class="col-md-9" style="text-align: left; vertical-align: middle;">{{ $i->transaction->title }}</td>
										<td class="col-md-4" style="text-align: right; vertical-align: middle;">{{ $i->amount }}
											{{-- </td> --}}
											{{-- <td> --}}
											@if ($i->transaction->users()->find(Auth::user()->id) == null)
												<br><a href="/Invoice/Pay/{{ $i->id }}"><i class="fa-regular fa-credit-card fa-xl"
													style="color: blue; padding-right:5px"></i></a>
											@endif
										</td>
									</tr>
								@endif
							@endforeach

							<tr>
								<td colspan="3" class="text-right">
									<h3>Total:</h3>
								</td>
								<td class="text-right text-danger">
									<h2><strong>{{ $sum_invoices }}</strong></h2>
								</td>
							</tr>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12" style="padding-top: 20px">
		<div class="row">
			<div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
				<div class="row">
				</div>
				<div class="row">
					<div class="receipt-header">
						<div class="col">
							<h3 >Payments </h3>
						</div>
					</div>
				</div>

				<div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="text-align: center">ID</th>
								<th style="text-align: center">Date</th>
								<th style="text-align: center">Title</th>
								<th style="text-align: center">Amount</th>
								<th style="text-align: center"></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($payments as $p)
								@if ($p->user_id == Auth::user()->id)
									<tr>
										<td class="col-md-2"style="text-align: center">{{ $i->transaction->id }}</td>
										<td class="col-md-3"style="text-align: center">{{ date_format($i->created_at, 'Y-m-d') }}</td>
										<td class="col-md-9">{{ $i->transaction->title }}</td>
										<td class="col-md-4">{{ $i->amount }}</td>
									</tr>
								@endif
							@endforeach
							<tr>
								<td colspan="3" class="text-right">
									<h3>Total: </h3>
								</td>
								<td colspan="2" class="text-right text-danger">
									<h2><strong>{{ $sum_payments }}</strong></h2>
								</td>
							</tr>
						</tbody>
					</table>


				</div>
			</div>
		</div>
	</div>
	<div style="display: flex; justify-content: flex-end">
		<a href="/Property/BuildingDetails/"><img src="/image/back.png" style="padding: 20px"></a>
	</div>
@endsection
