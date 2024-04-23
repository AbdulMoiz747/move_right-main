<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    
    public function create(Request $request){

        return view("landlords.inspections.create", [
            "landlord" => $request->landlord,
            "landlord_id" => $request->landlord->id,
            "property_id" => $request->property_id,
            "buyer_id" => $request->buyer_id,
        ]);
    }
    
    public function createBuyer(Request $request){

        return view("buyers.inspections.create", [
            "buyer" => $request->buyer,
            "landlord_id" => $request->landlord_id,
            "property_id" => $request->property_id,
            "buyer_id" => $request->buyer->id,
        ]);
    }

    function store(Request $request) {

        $inspection = Inspection::create([
            'landlord_id' => $request->input("landlord_id"),
            'buyer_id' => $request->input("buyer_id"),
            'property_id' => $request->input("property_id"),
            'from' => $request->input("from"),
            'items' => $request->input("items"),
            'comments' => $request->input("comments"),
        ]);

        return redirect()->route("landlords.contracts")->with("success", "Report sent successfully");
    }
    
    function storeBuyer(Request $request) {

        $inspection = Inspection::create([
            'landlord_id' => $request->input("landlord_id"),
            'buyer_id' => $request->input("buyer_id"),
            'property_id' => $request->input("property_id"),
            'from' => $request->input("from"),
            'items' => $request->input("items"),
            'comments' => $request->input("comments"),
        ]);

        return redirect()->route("buyers.inspections")->with("success", "Report sent successfully");
    }

    public function indexBuyer(Request $request){
        $inspections =  Inspection::where("buyer_id", $request->buyer->id)->get();

        return view("buyers.inspections.inspections", [
            "inspections" => $inspections,
            "buyer" => $request->buyer
        ]);
    }
    
    public function indexLandlord(Request $request){
        $inspections =  Inspection::where("landlord_id", $request->landlord->id)->get();

        return view("landlords.inspections.inspections", [
            "inspections" => $inspections,
            "landlord" => $request->landlord
        ]);
    }

    public function show($id, Request $request){
        $inspection = Inspection::findOrFail($id);

        return view("landlords.inspections.inspection", [
            "inspection" => $inspection,
            "landlord" => $request->landlord
        ]);
    }

    public function showBuyer($id, Request $request){
        $inspection = Inspection::findOrFail($id);

        return view("buyers.inspections.inspection", [
            "inspection" => $inspection,
            "buyer" => $request->buyer
        ]);
    }
}
