<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    public function DivisionView(){
        $divisions = ShipDivision::orderBy('id', 'DESC')->get();
        return view('backend.ship.division.view_division', compact('divisions'));
    }

    public function DivisionStore(Request $request){
        $request->validate([
            'division_name' => 'required',
        ]);
        
        ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Division Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DivisionEdit($id){
        $division = ShipDivision::findOrFail($id);
        return view('backend.ship.division.edit_division', compact('division'));
    }

    public function DivisionUpdate(Request $request, $id){
        $request->validate([
            'division_name' => 'required',
        ]);
        
        ShipDivision::findOrFail($id)->Update([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Coupon updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-division')->with($notification);
        
    }

    public function DivisionDelete($id){
        $division = ShipDivision::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Division Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // ship district all methods
    public function DistrictView(){
        $divisions = ShipDivision::orderBy('division_name', 'DESC')->get();
        $district = ShipDistrict::with('division')->orderBy('id', 'DESC')->get();
        return view('backend.ship.district.view_district', compact('divisions','district'));
    }

    public function DistrictStore(Request $request){
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ]);
        
        ShipDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'District Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DistrictEdit($id){
        $district = ShipDistrict::findOrFail($id);
        $divisions = ShipDivision::orderBy('division_name', 'DESC')->get();

        return view('backend.ship.district.edit_district', compact('district','divisions'));
    }

    public function DistrictUpdate(Request $request, $id){
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ]);
        
        ShipDistrict::findOrFail($id)->Update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'District updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-district')->with($notification);
        
    }

    public function DistrictDelete($id){
        $district = ShipDistrict::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'District Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // ship state all methods
    public function StateView(){
        $divisions = ShipDivision::orderBy('division_name', 'DESC')->get();
        $districts = ShipDistrict::orderBy('district_name', 'DESC')->get();
        $states = ShipState::with('division','district')->orderBy('id', 'DESC')->get();
        return view('backend.ship.state.view_state', compact('divisions','districts','states'));
    }

    public function StateStore(Request $request){
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ]);
        
        ShipState::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'State Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function GetDistrictName($division_id){
        $district = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','DESC')->get();
        return json_encode($district);
    }

    public function GetStateName($district_id){
        $state = ShipState::where('district_id',$district_id)->orderBy('state_name','DESC')->get();
        return json_encode($state);
    }

    public function StateEdit($id){
        $state = ShipState::findOrFail($id);
        $divisions = ShipDivision::orderBy('division_name', 'DESC')->get();
        $districts = ShipDistrict::orderBy('district_name', 'DESC')->get();


        return view('backend.ship.state.edit_state', compact('districts','divisions','state'));
    }

    public function StateUpdate(Request $request, $id){
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ]);
        
        ShipState::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'State Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-state')->with($notification);
        
    }

    public function StateDelete($id){
        $state = ShipState::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'State Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}

