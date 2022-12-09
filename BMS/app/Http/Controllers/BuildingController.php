<?php
namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Building;
use App\Models\Announcement;
use Illuminate\Http\Request;
use CreateUsersTable;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class BuildingController extends Controller
{
    public function New()
	{
		return view('/Building/New');
	}

	public function New_Submit(Request $request)
	{
		if (($request->name == null) || ($request->address == null) || ($request->nFloors == null) || ($request->nUnits == null)
			|| ($request->description == null))
		return back()->with("error", "Please fill all inputs")->withInput($request->all());

		$A = Auth::user()->buildings()->where('name', '=', $request->name);
		if ($A->count() == 0)
		{
			$B = new Building();
			{
				$B->name 		= $request->name;
				$B->address		= $request->address;
				$B->nFloors 	= $request->nFloors;
				$B->nUnits 		= $request->nUnits;
				$B->description = $request->description;
				$B->save();
				$B->managers()->attach(Auth::user()->id);
			}

			return redirect('/Property/List');
		}
		else
		{
			return back()
				->withInput($request->all())
				->with("error", "Duplicate Name found in building name");
		}
	}

	public function AddManager(Building $building)
	{
		return view('/Building/Manager/Add', [ 'B' => $building ]);
	}

	public function AddManager_Submit(Building $building, Request $request)
	{
		$u = User::where('username', '=', $request->username)->get()->first();
		if($u == null)
			return Back()->with("error", "User does not exsist");
		else
		{
			$building->managers()->attach($u->id);
			return redirect("/Building/Manager/List/$building->id");
		}
	}

	public function Managers(Building $building)
	{	
		$managers =  $building->managers;

		return view('/Building/Manager/List',
			[
				'building' 	=> $building,
				'managers'	=> $managers
			]);
	}

	public function ManagerDelete(User $manager, Building $building)
	{
		return view("/Building/Manager/Delete", 
			[
				'manager' 	=> $manager,
				'building'	=> $building
			]);
	}

	public function ManagerDelete_Submit(User $manager, Building $building)
	{	
		if($building->managers()->count() > 1)
		{
			$building->managers()->detach($manager->id);
			return redirect("/Building/Manager/List/$building->id");
		}
		else
			return redirect("/Building/Manager/List/$building->id")->with("error", "No other managers exist, please delete the building");		
	}

	public function Connect()
	{
		return view('/Building/Connect');
	}

	public function Connect_Submit(Request $request)
	{
		Auth::user()->buildings()->attach($request->id);

		return redirect("/Building/List");
	}

	public function BuildingDetails(Building $building)
	{
		return view("Property/BuildingDetails", [ 'building' => $building ]);
	}

	public function OwnerDetails(Apartment $apartment)
	{
		// $owner_apartments =  Auth::user()->owner_apartments()->get();
		return view("Property/OwnerDetails",
		 [ 
			// 'owner_apartments' => $owner_apartments ,
			'apartment'		=> $apartment,
			'building'		=> $apartment->building
		]);
	}

	public function List()
	{
		//building maneger
       $buildings = Auth::user()->buildings()->get();
	   //living apartment
		$living_apartments = Auth::user()->living_apartments()->get();
		//owner apartment
		$owner_apartments =  Auth::user()->owner_apartments()->get();

	   return view('/Property/List',[
									'buildings' 		=> $buildings,
	   								'living_apartments'	=> $living_apartments,
									'owner_apartments'  => $owner_apartments
									]);				
	}

	public function Edit(Building $building)
	{
		return view('/Building/Edit',['B'=>$building]);

	}

	public function Edit_Submit(Building $building, Request $request)
	{
		if (($request->name == null) || ($request->address == null) ||
			($request->nFloors == null) || ($request->nUnits == null))
			return back()->withInput($request->all())->with("error", "Please fill all inputs");

		$building->name 		= $request->name;
		$building->address 		= $request->address;
		$building->description 	= $request->description;
		$building->nFloors 	    = $request->nFloors;
		$building->nUnits 	    = $request->nUnits;
		$building->save();

		return redirect("/Property/BuildingDetails/$building->id");
	}

	public function Delete(Building $building)
	{
		return view('/Delete', 
			[ 
				'what'		=> "$building->name",
				'YesLink'	=> "/Building/Delete_Submit/$building->id",
				'NoLink'	=> "/Property/BuildingDetails/$building->id"
			]
		);
		// return view('/Building/Delete', [ 'building' => $building ]);
	}

	public function Delete_Submit(Building $building)
	{

		 if ($building->managers->count() == 1)
		 {
		 	if ($building->apartments->count() == 0)
			 {
				Auth::user()->buildings()->detach($building->id);
				$building->announcements()->delete();
				$building->transactions()->delete();	
				$building->delete();
				return redirect('/Property/List');
		 	}
		 	else
				return redirect('/Property/List')->with("error", "Can not delete building. Apartments still exist in the building.");
		}
		else
		{
			Auth::user()->buildings()->detach($building->id);
			return redirect('/Property/List')->with("error", "Managers still exist for the building. The building is removed from your list.");;
		}
	}
	


}
