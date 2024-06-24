<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class AuthSetter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if( Filament::auth()->check() ){

            if( !Cache::has('profile_picture') ){
                Cache::set('profile_picture', auth()->user()->profile_photo_url);
            }
            if( !Cache::has('ai_profile_picture') ){
                Cache::set('ai_profile_picture', asset('media/ai1.jfif'));
            }



        }else{
            if(Cache::has('profile_picture')){
                Cache::delete('profile_picture');
            }
            if(Cache::has('ai_profile_picture')){
                Cache::delete('ai_profile_picture');
            }
        }
        return $next($request);
    }
}
