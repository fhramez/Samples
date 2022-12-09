<?php

namespace App\Http\Controllers;
use App\Models\Announcement;
use App\Models\Transaction;
use Illuminate\Http\Request;
use CreateUsersTable;
use App\Models\Building;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;


class TransactionController extends Controller
{
   public function List(Building $building)
   {
		$transactions  = $building->transactions()->get();

		return view("/Transaction/List",
			[
				'building' 			=> $building,
				'transactions'		=> $transactions
			]);
	
   }
   public function New(Building $building)
   {
		return view("/Transaction/New",
		[
			'building' => $building
		]);
   }

   public function New_Submit(Building $building, Request $request)
   {
	return "ok";
		if (($request->type == null) || ($request->division_type == null) || ($request->related_to == null) || ($request->amount == null)
			||($request->title == null))
			return back()->withInput($request->all())->with("error", "Please fill all inputs");

			$transaction = new Transaction();

			$transaction->title 		=   $request->title;
			$transaction->type			 = $request->type;
			$transaction->description 	 = $request->description;
			$transaction->division_type  = $request->division_type;
			$transaction->related_to 	 = $request->related_to;
			$transaction->amount		 = $request->amount;
			$transaction->building_id	 = $building->id;

			$transaction->save();

			$transaction->apartments()->attach($request->apartmentids);

			$this->CreateInvoices($transaction);
		
			return redirect("/Transaction/List/$building->id");
	}

	public function Edit(Transaction $transaction)
	{
		return view("/Transaction/Edit",
		[
			'transaction' => $transaction
		]);
	}

    public function CreateInvoices(Transaction $transaction)
	{

		if ($transaction->division_type == 'Equal')
		{
			$transaction->invoices()->delete();

			$apartments = $transaction->apartments;

			foreach($apartments as $a)
			{
				$i = new Invoice();
				$i->amount 			= $transaction->amount / $apartments->count();
				$i->transaction_id 	= $transaction->id;
				$i->apartment_id 	= $a->id;
				// $i->title			= $transaction->title;
				// $i->description		= $transaction->description;

				$i->save();
			}
		}

		if ($transaction->division_type == 'Area')
		{
			$transaction->invoices()->delete();

			$apartments = $transaction->apartments;
			$sum = 0;

			foreach($apartments as $a)
				$sum = $a->area + $sum;

			foreach($apartments as $a)
			{
				$i = new Invoice();
				$i->amount = $a->area * $transaction->amount / $sum;
				$i->transaction_id 	= $transaction->id;
				$i->apartment_id 	= $a->id;
				$i->save();
			}	
		}

		if ($transaction->division_type == 'Persons')
		{

			$transaction->invoices()->delete();

			$apartments = $transaction->apartments;
			$sum = 0;

			foreach($apartments as $a)
			{
				if ($transaction->related_to == 'Living')
					$user = $a->living_user;
				else
					$user = $a->owner_user;
			
				if ($user != null)
					$sum = $user->persons + $sum;
			}

			foreach($apartments as $a)
			{
				if ($transaction->related_to == 'Living')
					$user = $a->living_user;
				else
					$user = $a->owner_user;

				if ($user != null)
				{
					$i = new Invoice();
					$i->amount = $user->persons * $transaction->amount / $sum;
					$i->transaction_id 	= $transaction->id;
					$i->apartment_id 	= $a->id;
					$i->save();
				}
			}	

		}
	

	}

	public function Edit_Submit(Transaction $transaction, Request $request)
	{
		$transaction->title 		=   $request->title;
		$transaction->type 			=   $request->type;
		$transaction->description 	= 	$request->description;
		$transaction->division_type	= 	$request->division_type;
		$transaction->related_to	=	$request->related_to;
		$transaction->amount		=	$request->amount;
		$transaction->save();

		$transaction->apartments()->sync($request->apartmentids);

		$this->CreateInvoices($transaction);

		// $building = $transaction->building;
		return redirect("/Transaction/Details/$transaction->id");
	}

	public function Delete(Transaction $transaction)
	{
		$building = $transaction->building;
		return view('/Delete', 
			[
				'building'  => $building,
				'what'		=> $transaction->title,
				'YesLink'	=> "/Transaction/Delete_Submit/$transaction->id",
				'NoLink'	=> "/Transaction/List/$building->id"
			]);
	}

	public function Delete_Submit(Transaction $transaction)
	{
		$building = $transaction->building;
		$transaction->invoices()->delete();
		$transaction->apartments()->detach();
		$transaction->delete();

		return redirect("/Transaction/List/$building->id");

	}

	public function Details(Transaction $transaction)
	{
		return view('/Transaction/Details',['transaction'=>$transaction]);
	}

















}
