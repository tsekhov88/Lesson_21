<?php
namespace App\Http\Middleware;
use Closure;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware as JWTBaseMiddleware;
/**
 * Class Authenticate
 * @package App\Http\Middleware
 */
class Authenticate extends JWTBaseMiddleware
{

    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($request);
        return $next($request);
    }

    public function checkForToken(Request $request) : void
    {
        if (! $this->auth->parser()->setRequest($request)->hasToken()) {
            throw new UnauthorizedHttpException('jwt-auth', 'Token not provided');
        }
    }

    public function authenticate(Request $request) : void
    {
        $this->checkForToken($request);
        try {
            if (! $this->auth->parseToken()->authenticate()) {
                abort(401);
            }
        } catch (JWTException $exception) {
            abort(401);
        }
    }
}