<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class LoginUserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   //↓'!'で非定型。「ユーザーじゃなければ」になる。
        if(!Auth::check()){
            return redirect()->route('login');
        } //↑redirect()は必須。auth.phpでnameを'login'にしているから「->route('login')」が必要になってくる。
        return $next($request);
    }
}
