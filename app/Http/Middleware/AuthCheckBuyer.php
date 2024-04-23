<?php

namespace App\Http\Middleware;

use App\Models\Buyer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class AuthCheckBuyer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!(session()->has("LoggedBuyer"))) {
            $previous = URL::previous();

            return redirect($previous)->with("buyerFail", "Login first.");
            
        }

        // Passing down users data for the template
        $id = session("LoggedBuyer");
        $request->buyer = Buyer::where("id", "=", $id)->first();
        
        return $next($request);
    }
}
