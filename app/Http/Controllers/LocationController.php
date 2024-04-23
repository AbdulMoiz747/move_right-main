<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Models\Area;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function getAreasByCity(Request $request){
        $cityId = $request->input('city_id');
        $areas = Area::where('city_id', $cityId)->get(['id', 'name']);
        return response()->json($areas);
    }
}
