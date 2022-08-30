<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
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
        if(auth()->user()->role == 'hrd') {
            return redirect('/hrd/index');
        }else if(auth()->user()->role == 'keuangan'){
            return redirect('/keuangan/index');
        }else{
            return redirect('index')->with('error', 'Anda tidak memiliki akses');
        }
    }
}
