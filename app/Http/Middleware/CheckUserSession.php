<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\V1\ApiBaseController;
use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckUserSession extends Controller
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('user')) {
            if ($request->expectsJson()) {
                return $this->err('Unauthorized Access', [], 401);
            } else {
                return redirect('/');
            }
        }
        return $next($request);
    }
}
