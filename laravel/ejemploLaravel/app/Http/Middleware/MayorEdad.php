<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MayorEdad
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $edad)
    {
        if ($request->route('edad') < $edad) {
            //Se pasa la dirección absolouta, por lo que si la cambiamos debemos cambiarlo en todos los sitios
            //return redirect('/login');
            return redirect()->route('login');
            //return redirect()->back(); //Carga la ruta antigua
        }
        return $next($request);
    }
}
