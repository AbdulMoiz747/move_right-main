<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Area;
use App\Models\City;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index(Request $request){
        $properties =  Property::where("landlord_id", $request->landlord->id)->get();

        return view("landlords.properties.properties", [
            "properties" => $properties,
            "landlord" => $request->landlord
        ]);
    }

    public function create(Request $request){
        $cities = City::all();
        $areas = Area::all();

        return view("landlords.properties.create", [
            "landlord" => $request->landlord,
            "cities" => $cities,
            "areas" => $areas
        ]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
        ]);
        
        $location = Location::create([
            'city_id' => $request->city_id,
            'area_id' => $request->area_id,
        ]);
        
        $validatedData['location_id'] = $location->id;
        
        $uuid = Str::uuid()->toString();

        $property = Property::create([
            'title' => $request->input("title"),
            'description' => $request->input("description"),
            'address' => $request->input("address"),
            'landlord_id' => $request->input("landlord_id"),
            'location_id' => $location->id,
            'type' => $request->input("type"),
            'list_in' => $request->input("list_in"),
            'sq_yard' => $request->input("sq_yard"),
            'price' => $request->input("price"),
            'allow_sublet' => $request->input("allow_sublet"),
            'bedrooms' => $request->input("bedrooms"),
            'bathrooms' => $request->input("bathrooms"),
            'kitchens' => $request->input("kitchens"),
            'garages' => $request->input("garages"),
            'built_year' => $request->input("built_year"),
            'amenities' => $request->input("amenities"),
            'status' => "available",
            'uuid' => $uuid,
            'media' => [],
        ]);
        
        if ($request->hasFile("media")) {
            $mediaPaths = [];
            $propertyMediaFolder = 'property_media/' . $uuid;
        
            $i = 0;
            foreach ($request->file('media') as $file) {
                $fileName = $i . "_" . $file->getClientOriginalName();
        
                $path = $file->storeAs('public/' . $propertyMediaFolder, $fileName);
        
                $mediaPaths[] = $path;
                $i++;
            }
        
            $property->media = $mediaPaths;
            $property->save();
        }

        return back()->with("success", "Property Created successfully");
    }

    public function show($id, Request $request){
        $property = Property::findOrFail($id);

        return view("public.property", [
            "property" => $property,
            "landlord" => $request->landlord
        ]);
    }

    public function edit($id, Request $request){
        $property = Property::findOrFail($id);
        $cities = City::all();
        $areas = Area::all();

        return view("landlords.properties.edit", [
            "landlord" => $request->landlord,
            "property" => $property,
            "cities" => $cities,
            "areas" => $areas,
        ]);
    }

    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'landlord_id' => 'exists:landlords,id',
            'type' => 'nullable|in:house,plot,apartments,industrial,condos,villas,lofts',
            'list_in' => 'nullable|in:sell,rent',
            'sq_yard' => 'integer',
            'price' => 'integer',
            'allow_sublet' => 'nullable|boolean',
            'bedrooms' => 'integer',
            'bathrooms' => 'integer',
            'kitchens' => 'integer',
            'garages' => 'integer',
            'built_year' => 'integer',
            'amenities' => 'nullable|array',
            'media' => 'nullable|array',
        ]);
        
        $property = Property::findOrFail($id);

        $hasCityChanged = $property->location->city->id != $request->city_id ? true : false;
        $hasAreaChanged = $property->location->area->id != $request->area_id ? true : false;

        if ($hasCityChanged || $hasAreaChanged) {
            $property->location->delete();
            $location = Location::create([
                'city_id' => $request->city_id,
                'area_id' => $request->area_id,
            ]);
        }
        
        $location_id = $location->id ?? $property->location->id;
        
        $uuid = $property->uuid;

        $mediaToKeep = [];

        if ($request->has("existingMedia")) {
            $mediaToKeep = array_intersect($property->media, $request->input("existingMedia"));
            $mediaToKeep = array_values($mediaToKeep);
            $mediaToDelete = array_diff($property->media, $request->input("existingMedia"));
            foreach ($mediaToDelete as $mediaPath) {
                Storage::delete($mediaPath);
            }
        }

        if ($request->hasFile("media")) {
            $propertyMediaFolder = 'property_media/' . $uuid;
        
            $i = 0;
            foreach ($request->file('media') as $file) {
                $fileName = $i . "_" . $file->getClientOriginalName();
        
                $path = $file->storeAs('public/' . $propertyMediaFolder, $fileName);
        
                $mediaToKeep[] = $path;
                $i++;
            }
        
        }
        $property->media = $mediaToKeep;

        $property->update([
            'title' => $request->input("title"),
            'description' => $request->input("description"),
            'address' => $request->input("address"),
            'landlord_id' => $request->input("landlord_id"),
            'location_id' => $location_id,
            'type' => $request->input("type"),
            'list_in' => $request->input("list_in"),
            'sq_yard' => $request->input("sq_yard"),
            'price' => $request->input("price"),
            'allow_sublet' => $request->input("allow_sublet"),
            'bedrooms' => $request->input("bedrooms"),
            'bathrooms' => $request->input("bathrooms"),
            'kitchens' => $request->input("kitchens"),
            'garages' => $request->input("garages"),
            'built_year' => $request->input("built_year"),
            'amenities' => $request->input("amenities"),
            'status' => "available",
            'uuid' => $uuid,
        ]);

        return back()->with("success", "Property Updated Successfully") ;

    }

    public function destroy($id){
        $property = Property::findOrFail($id);
        $property->delete();

        return back()->with("success", "Property Deleted Successfully");
    }
}
