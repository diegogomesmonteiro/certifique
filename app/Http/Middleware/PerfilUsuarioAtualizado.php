<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PerfilUsuarioAtualizado
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
        $rota = $request->route()->getName();
        $user = auth()->user();
        if(is_null($user->cpf) && $rota != 'settings.index' && $rota != 'settings.update'){
            return redirect()->route('settings.index')->with('danger', 'Você precisa informar o seu CPF para continuar');
        }   
        return $next($request);
    }
}
