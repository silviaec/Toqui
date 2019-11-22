<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;
 
class CheckKlass
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::where('id', Auth::id())->with(['klasses'])->first();
        $klasses = $user->klasses;
        $flag = true;
        foreach($klasses as $klass) {
            if($klass->id == session('current_klass')) {
                $flag = true;
            }
        }
        if (!$flag) {
            return redirect('home');
        }

        return $next($request);
    }
}
