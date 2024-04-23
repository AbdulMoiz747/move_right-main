<?php

namespace App\Http\Controllers;

use App\Models\Landlord;
use App\Http\Requests\StoreLandlordRequest;
use App\Http\Requests\UpdateLandlordRequest;
use App\Models\Area;
use App\Models\City;
use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LandlordController extends Controller{
    
    public function index(){
        $landlords = Landlord::all();
        return view('landlords.index', compact('landlords'));
    }
    
    public function profile(Request $request){
        $landlord = Landlord::find($request->landlord->id);
        $cities = City::all();
        $areas = Area::all();

        return view('landlords.profile', [
            "landlord" => $landlord,
            "cities" => $cities,
            "areas" => $areas
        ]);
    }

    public function update(Request $request, $id){
        $landlord = Landlord::findOrFail($id);

        $hasCityChanged = $landlord->location->city->id != $request->city_id ? true : false;
        $hasAreaChanged = $landlord->location->area->id != $request->area_id ? true : false;

        if ($hasCityChanged || $hasAreaChanged) {
            $location = Location::create([
                'city_id' => $request->city_id,
                'area_id' => $request->area_id,
            ]);
        }
        
        $location_id = $location->id ?? $landlord->location->id;

        $landlord->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'about' => $request->about,
            'location_id' => $location_id
        ]);

        if ($request->hasFile('profile_picture')) {
            $fileName = time(). "_" . $request->file('profile_picture')->getClientOriginalName();
            $path = $request->file('profile_picture')->storeAs('public/profile-pictures', $fileName);

            $landlord->update([
                'profile_picture' => $path,
            ]);

        }

        return back()->with('success', 'Profile updated successfully.');
    }

    public function create(Request $request){
        return view('landlords.create', [
            "landlord" => $request->landlord
        ]);
    }

    public function store(Request $request){

        $landlord = new Landlord([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);
    
        $landlord->save();

        return redirect()->route('public.home')->with([
            'success' => 'Landlord Registered successfully',
            'from' => 'signup',
        ]);
    }

    public function show($id){
        $landlord = Landlord::find($id);
        $properties = $landlord->properties;
        
        return view('public.landlord', [
            "landlord" => $landlord,
            "properties" => $properties
        ]);
    }

    public function edit(Landlord $landlord){
        return view('landlords.edit', compact('landlord'));
    }


    public function destroy(Landlord $landlord){
        $landlord->delete();

        return redirect()->route('landlords.index')
            ->with('success', 'Landlord deleted successfully');
    }

    function login(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');
        
        $landlord = Landlord::where('email', $email)->first();
    
        if ($landlord) {
            if (password_verify($password, $landlord->password)) {
                session()->put(["LoggedLandlord" => $landlord->id]);
                
                return redirect()->route("landlords.dashboard");

            } else {
                return redirect()->back()->with("fail", "Password is not correct");
            }
        } else {
            return redirect()->back()->with("fail", "Email not Found");
        }
    }

    public function logout(){
        if (session()->has('LoggedLandlord')) {
            session()->pull("LoggedLandlord");
            return redirect()->route("public.home")->with('success', 'Logged out Successfully');
        }else{
            return "m";
        }
    }

    public function dashboard(Request $request){
        return view("landlords.dashboard", [
            "landlord" => $request->landlord
        ]);
    }
}
