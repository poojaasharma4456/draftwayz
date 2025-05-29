<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\ApiNflService;

class MyTeamMiddleware
{
    protected $apiNflService;

    public function __construct(ApiNflService $apiNflService)
    {
        $this->apiNflService = $apiNflService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $count = $this->apiNflService->getCurrentTeamCount(); 
        
        if ($count == 11) {
            return $next($request);
        }

        return redirect()->back()->with('error', 'Your team does not have exactly 5 players.');
    }
}

