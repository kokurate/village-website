<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\SuratOnline;
use Carbon\Carbon;

class ExpiredSuratOnline
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

        $fetch = SuratOnline::where('created_at', '<', Carbon::now()->subMinutes(30))
        ->whereNotNull('token')
        ->get();

        foreach ($fetch as $data) {
            $data->delete();
        }


        return $next($request);
    }
}
