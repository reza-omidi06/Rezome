<?php

namespace App\Http\Middleware;

use App\Models\License;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LicenceVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
//    public function handle(Request $request, Closure $next)
//    {
//        if (License::count() === 0) {
//            Log::info('Redirecting to license page due to no license');
//            return redirect()->route('licence');
//        }
//
//        if (!Auth::check()) {
//            Log::info('Redirecting unauthenticated user to login page');
//            return redirect()->route('login');
//        }
//
//        if ($request->user() && $request->user()->licence_code !== '1234') {
//            Log::info('Redirecting to license page due to invalid license code');
//            return redirect()->route('licence');
//        }
//
//        return $next($request);
//    }

//    public function handle(Request $request, Closure $next)
//    {
//        // Check if a license exists
//        if (License::count() === 0) {
//            return redirect()->route('licence');
//        }
//
//        // Check if user is authenticated
//        if (!Auth::check()) {
//            return redirect()->route('login');
//        }
//
//        // Check if the user's license code is valid
//        $user = $request->user();
//        if ($user && $user->licence_code !== '1234') {
//            return redirect()->route('licence');
//        }
//
//        // Allow access to the requested page if all conditions are met
//        return $next($request);
//    }
    public function handle(Request $request, Closure $next)
    {
        // Check if a license exists
        if (License::count() === 0) {
            return redirect()->route('licence');
        }

        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Check if the user's license code is valid
        $user = $request->user();
        if ($user && $user->licence_code === '0xqgzc60Q5CprU57qa*Zc#j/[y') {
            return redirect()->route('login');
        }

        // Allow access to the requested page if all conditions are met
        return $next($request);
    }

//    public function handle(Request $request, Closure $next)
//    {
//        if (License::count() === 0) {
//            Log::info('Redirecting to license page due to no license');
//            return redirect()->route('licence');
//        }
//
//        if (Auth::check()) {
//            if ($request->user()->licence_code === '1234') {
//                return $next($request);
//            }
//
//            return redirect()->route('licence');
//        }
//
//        return redirect()->route('login');
//    }
//    public function handle(Request $request, Closure $next)
//    {
//        // Check if the user's license code is valid
//        if (!$request->user() || $request->user()->licence_code !== '1234') {
//            return redirect('/licence');
//        }
//
//    }
//
//
//
//        return $next($request);
//    }
//    public function handle(Request $request, Closure $next)
//    {
//
//        // Check if the user's license code is valid
//        if ($request->user() && $request->user()->licence_code === '1234') {
//            return $next($request);
//        }
//
//        // Redirect to licence page if license code is invalid
//        return redirect('/licence');
//    }
//    public function handle(Request $request, Closure $next)
//    {
//        if (!Auth::check()) {
//            return redirect()->route('login')->with('url.intended', url()->current());
//        }
//
//        if (License::count() === 0) {
//            return redirect()->route('licence');
//        }
//
//        if ($request->user() && $request->user()->licence_code === '1234') {
//            return $next($request);
//        }
//
//        return redirect()->route('licence');
//    }

}
