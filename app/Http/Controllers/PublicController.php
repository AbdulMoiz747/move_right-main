<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{

    function home() {
        $latestProperties = Property::latest()->take(3)->get();
        $bestProperties = Property::inRandomOrder()->limit(3)->get();
        

        return view("public.home", [
            "latestProperties" => $latestProperties,
            "bestProperties" => $bestProperties,
        ]);
    }

    function search(Request $request) {

        $dbQuery = Property::query();
    
        if ($request->filled('keywords')) {
            $keywords = $request->input('keywords');
            $dbQuery->where('title', 'like', '%' . $keywords . '%');
        }
        
        if ($request->filled('type')) {
            $type = $request->input('type');
            $dbQuery->where('type', $type);
        }

        if (!$request->filled('keywords') && !$request->filled('type')) {
            $dbQuery->inRandomOrder()->limit(10);
        }

        if ($request->filled('price_range')) {
            $priceRange = $request->input('price_range');
            list($minPrice, $maxPrice) = $this->extractPriceRange($priceRange);

            $dbQuery->whereBetween('price', [$minPrice, $maxPrice]);
        }

        $properties = $dbQuery->get();

        return view('public.search', [
            'properties' => $properties,
        ]);

    }

    function contact() {

        return view("public.contact");
        
    }
    
    private function extractPriceRange($priceRange)
    {
        $cleanedRange = Str::of($priceRange)->replace(['£', ','], '');
        list($minPrice, $maxPrice) = explode('-', $cleanedRange);

        return [(int)$minPrice, (int)$maxPrice];
    }
    


}
