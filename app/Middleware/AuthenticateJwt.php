<?php
namespace App\Middleware;

use Agp\BaseUtils\Traits\AuthenticateContaIdToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AuthenticateJwt {

    use AuthenticateContaIdToken;

    private function rotaAberta(Request $request)
    {
        //Rotas de login
        if (Route::current()->uri() == 'login')
            return true;
        if (Route::current()->uri() == 'login/{user}')
            return true;
        if (Route::current()->uri() == 'registrar')
            return true;
        if (Route::current()->uri() == 'login/{user}/recover')
            return true;
        if (Route::current()->uri() == 'do-forget/{email}')
            return true;
        if (Route::current()->uri() == 'logout-all')
            return true;
        if (Route::current()->uri() == 'password/reset/{token}/{email}')
            return true;
        if (Route::current()->uri() == 'password/reset/{token}/{email}')
            return true;

        //Rotas da app

        return false;
    }

    private function rotaSemiAberta(Request $request)
    {
        //Rotas de login
        if (Route::current()->uri() == 'login/{user}/company')
            return true;
        if (Route::current()->uri() == 'pos-login')
            return true;

        //Rotas da app

        return false;
    }
}
