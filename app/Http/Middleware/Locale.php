<?php

namespace App\Http\Middleware;

use Closure;

class Locale
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

        if(!session()->has('locale')){
            session(['locale' => $request->getPreferredLanguage(config('app.locates'))]);
        }
            app()->setlocale(session('locale'));
            setlocale(LC_TIME, session('Locale'));
            return $next($request);

            $locale = session('locale');

            $conversion =[
                'fr' => 'fr_FR',
                'en' => 'en_US',
            ];
    
            $locale = $conversion[$locale];
            setlocale(LC_TIME, $locale);            
        
    }
}
