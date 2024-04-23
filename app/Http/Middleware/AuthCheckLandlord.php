<?php

namespace App\Http\Middleware;

use App\Models\Landlord;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheckLandlord
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!(session()->has("LoggedLandlord"))) {
            return redirect(route("public.home"))->with("fail", "Login first.");
        }

        // Passing down users data for the template
        $id = session("LoggedLandlord");
        $request->landlord = Landlord::where("id", "=", $id)->first();
        
        return $next($request);
    }
}
