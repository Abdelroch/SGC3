<?php
namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user(); // Obtém o usuário autenticado

                // Verifica o nível de acesso do usuário para definir a rota
                $homeRoute = RouteServiceProvider::HOME; // Valor padrão

                // Aqui você pode adicionar a lógica para determinar a rota com base no nível de acesso
                if ($user->accessId == 1) {
                    $homeRoute = '/admin/dashboard/profile'; // Rota de admin
                } elseif ($user->accessId == 2) {
                    $homeRoute = '/user/dashboard'; // Rota de usuário comum
                }

                // Redireciona para a rota correta
                return redirect($homeRoute);
            }
        }

        return $next($request);
    }
}
