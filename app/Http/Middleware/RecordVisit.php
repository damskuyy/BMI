<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visit;

class RecordVisit
{
    public function handle($request, Closure $next)
    {
        if ($request->isMethod('GET')) {
            Visit::create([
                'ip' => $request->ip(),
                'path' => $request->path(),
                'visited_at' => now(),
            ]);
        }

        return $next($request);
    }
}