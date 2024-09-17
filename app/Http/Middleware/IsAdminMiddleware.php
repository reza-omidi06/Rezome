<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // بررسی می‌کنیم که آیا کاربر لاگین کرده و ادمین است
        if ($request->user() && $request->user()->is_admin == 1) {
            return $next($request);  // اگر ادمین است، درخواست ادامه می‌یابد
        } else {
            return redirect()->route('home')->with([
                'message' => 'You do not have access to the admin panel',
                'alert-type' => 'error'
            ]);
        }
    }
}
