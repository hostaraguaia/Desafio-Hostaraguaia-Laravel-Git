<?php

namespace Modules\Authentication\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Utils\Library\Network;
use Modules\Authentication\Repositories\RequestLogRepository;

class RequestLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $route)
    {
        $response = null;

        $userAgent = $request->userAgent();
        $ip = Network::GetIP();
        $url = $request->url();
        $token = $request->bearerToken();
        $header = $request->header();
        $body = $request->all();
        $type = $request->method();

        if (empty($body))
            $body = '{}';

        if (empty($body))
            $response = '{}';

        $data = [
            'route' => $route,
            'user_agent' => json_encode($userAgent, true),
            'url' => $url,
            'type' => $type,
            'body' => json_encode($body, true),
            'header' => json_encode($header, true),
            'response' => json_encode($response, true),
            'token' => $token,
            'url' => $url,
            'ip' => $ip,
        ];

        $log = app(RequestLogRepository::class)->create($data);

        $response = $next($request);
        $log->response = json_encode($response, true);
        $log->code = $response->status();
        $log->situation = $log->code >= 200 && $log->code <= 300 ? 'successful' : 'falied';
        $log->save();

        return $response;
    }
}
