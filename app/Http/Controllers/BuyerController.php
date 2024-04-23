<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Http\Requests\StoreBuyerRequest;
use App\Http\Requests\UpdateBuyerRequest;
use App\Models\Area;
use App\Models\City;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BuyerController extends Controller
{
    
    public function store(StoreBuyerRequest $request){
        $buyer = new Buyer([
            'name' => $request->buyerName,
            'email' => $request->buyerEmail,
            'password' => Hash::make($request->buyerPassword),
            'phone' => $request->buyerPhone,
        ]);
    
        $buyer->save();

        return redirect()->route('public.home')->with([
            'buyerSuccess' => 'Buyer Registered successfully',
            'buyerFrom' => 'buyerSignup',
        ]);
    }

    public function profile(Request $request){
        $buyer = Buyer::find($request->buyer->id);
        $cities = City::all();
        $areas = Area::all();

        return view('buyers.profile', [
            "buyer" => $buyer,
            "cities" => $cities,
            "areas" => $areas
        ]);
    }

    public function update(Request $request, $id){
        $buyer = Buyer::findOrFail($id);

        $hasCityChanged = $buyer->location->city->id != $request->city_id ? true : false;
        $hasAreaChanged = $buyer->location->area->id != $request->area_id ? true : false;

        if ($hasCityChanged || $hasAreaChanged) {
            $location = Location::create([
                'city_id' => $request->city_id,
                'area_id' => $request->area_id,
            ]);
        }
        
        $location_id = $location->id ?? $buyer->location->id;

        $buyer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'about' => $request->about,
            'location_id' => $location_id
        ]);

        if ($request->hasFile('profile_picture')) {
            $fileName = time(). "_" . $request->file('profile_picture')->getClientOriginalName();
            $path = $request->file('profile_picture')->storeAs('public/profile-pictures', $fileName);

            $buyer->update([
                'profile_picture' => $path,
            ]);

        }

        return back()->with('success', 'Profile updated successfully.');
    }

    function login(Request $request) {
        $email = $request->input('buyerEmail');
        $password = $request->input('buyerPassword');
        
        $buyer = Buyer::where('email', $email)->first();
    
        if ($buyer) {
            if (password_verify($password, $buyer->password)) {
                session()->put(["LoggedBuyer" => $buyer->id]);

                return redirect()->back();
            } else {
                return redirect()->back()->with("buyerFail", "Password is not correct");
            }
        } else {
            return redirect()->back()->with("buyerFail", "Email not Found");
        }
    }
    
    public function logout(){
        if (session()->has('LoggedBuyer')) {
            session()->pull("LoggedBuyer");
            return redirect()->route("public.home")->with('buyerSuccess', 'Logged out Successfully');
        }else{
            return "m";
        }
    }

    public function dashboard(Request $request){
        return view("buyers.dashboard", [
            "buyer" => $request->buyer
        ]);
    }
}
