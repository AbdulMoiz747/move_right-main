<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\LandlordController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PublicController;
use App\Models\Property;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [PublicController::class, "home"])->name("public.home");

Route::middleware(["AuthCheckBuyer"])->group(function(){
    Route::get("/rent-contract", [ContractController::class, "rentContract"])->name("public.contract.rent.create");
    Route::get("/sell-contract", [ContractController::class, "sellContract"])->name("public.contract.sell.create");

});

Route::get("/contract/{id}", [ContractController::class, "show"])->name("public.contract.rent");

Route::get("/property/{id}", [PropertyController::class, "show"])->name("public.property");
Route::get("/landlord/{id}", [LandlordController::class, "show"])->name("public.landlord");
Route::get("/listings", [PublicController::class, "search"])->name("public.listings");
Route::get("/contact", [PublicController::class, "contact"])->name("public.contact");

Route::get("/test", function(){

    return view("testing", [
        "img" => "public/property_media/de192c7e-23bd-4e04-b255-a5736ac761d5/0_jameel.jpg"
    ]);
});

Route::prefix("landlords")->group(function(){
    
    Route::middleware(["AuthCheckLandlord"])->group(function(){
        Route::get('dashboard', [LandlordController::class, "dashboard"])->name("landlords.dashboard");
        Route::get('{landlord}/profile', [LandlordController::class, "profile"])->name("landlords.profile");
        Route::put('{landlord}/profile', [LandlordController::class, "update"])->name("landlords.profile.update");
        Route::get('logout', [LandlordController::class, "logout"])->name("landlords.logout");

        Route::prefix("properties")->group(function(){
            Route::get("/", [PropertyController::class, "index"])->name("landlords.properties");

            Route::get("create", [PropertyController::class, "create"])->name("landlords.properties.create");
            Route::post("/", [PropertyController::class, "store"])->name("landlords.properties.store");
            Route::get("{property}/edit", [PropertyController::class, "edit"])->name("landlords.properties.edit");
            Route::put("{property}/edit", [PropertyController::class, "update"])->name("landlords.properties.update");
            Route::get("{property}/delete", [PropertyController::class, "destroy"])->name("landlords.properties.delete");
            
        });
        
        Route::prefix("contracts")->group(function(){
            Route::get("/", [ContractController::class, "indexLandlord"])->name("landlords.contracts");
            Route::get("{contract}/nullNvoid", [ContractController::class, "nullNvoid"])->name("landlords.contracts.nullNvoid");
        });
        
        Route::prefix("inspections")->group(function(){
            Route::get("/create", [InspectionController::class, "create"])->name("landlords.inspections.create");
            Route::post("/", [InspectionController::class, "store"])->name("landlords.inspections.store");
            Route::get("/", [InspectionController::class, "indexLandlord"])->name("landlords.inspections");
            Route::get("/{inspection}", [InspectionController::class, "show"])->name("landlords.inspections.inspection");
        });
        
    });
    Route::get('get-areas-by-city', [LocationController::class, 'getAreasByCity'])->name("landlords.properties.getAreasByCity");
    
    Route::post('/', [LandlordController::class, "store"])->name("landlords.store");
    
    Route::middleware(["AlreadyLoggedLandlord"])->group(function(){
        Route::post('login', [LandlordController::class, "login"])->name("landlords.login");
    });

});

Route::prefix("buyers")->group(function(){
    
    Route::middleware(["AuthCheckBuyer"])->group(function(){
        Route::get('dashboard', [BuyerController::class, "dashboard"])->name("buyers.dashboard");
        Route::get('logout', [BuyerController::class, "logout"])->name("buyers.logout");
        Route::get('{buyer}/profile', [BuyerController::class, "profile"])->name("buyers.profile");
        Route::put('{buyer}/profile', [BuyerController::class, "update"])->name("buyers.profile.update");


        Route::prefix("contracts")->group(function(){
            Route::get("/", [ContractController::class, "indexBuyer"])->name("buyers.contracts");
            Route::post("/", [ContractController::class, "store"])->name("buyers.contracts.store");
            Route::get("{contract}/nullNvoid", [ContractController::class, "nullNvoidBuyer"])->name("buyers.contracts.nullNvoid");

        });

        Route::prefix("inspections")->group(function(){
            Route::get("/create", [InspectionController::class, "createBuyer"])->name("buyers.inspections.create");
            Route::post("/", [InspectionController::class, "storeBuyer"])->name("buyers.inspections.store");
            Route::get("/", [InspectionController::class, "indexBuyer"])->name("buyers.inspections");
            Route::get("/{inspection}", [InspectionController::class, "showBuyer"])->name("buyers.inspections.inspection");
        });

        Route::get("properties", [BuyerController::class, "properties"]);

        
    });
    
    Route::post('/', [BuyerController::class, "store"])->name("buyers.store");
    
    Route::middleware(["AlreadyLoggedBuyer"])->group(function(){
        Route::post('login', [BuyerController::class, "login"])->name("buyers.login");
    });

});
