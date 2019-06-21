<?php
namespace App\Http\Middleware;
use Closure;

class FindingSession
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
        if(!$request->session()->exists('userId'))
        {
            return redirect()->action('MainController@login', ['login' => 'sessionNotFound']);
        }
        return $next($request);
    }
}