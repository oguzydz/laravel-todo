<?php declare(strip_tags=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CheckAlert
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->exists('success')) {
            Alert::toast(Session('success'), 'success');
        } elseif ($request->session()->exists('Error')) {
            Alert::toast(Session('error'), 'error');
        }

        return $next($request);
    }
}
