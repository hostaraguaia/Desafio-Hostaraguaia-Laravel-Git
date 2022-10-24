<?php

namespace Modules\Authentication\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Modules\Utils\Enums\StatusEnum;
use Modules\Utils\ApiReturn\ApiReturn;
use Modules\Permission\Enum\PermissionItemTypeEnum;
use Modules\Permission\Repositories\PermissionMapRepository;

class AccessControlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        $jsonRequest = $request->isJson();
        $permission = app(PermissionMapRepository::class);
        $permission->setThrowable($jsonRequest);

        if ($user->isBlocked)
            return ApiReturn::ErrorMessage("Usuário Bloqueado", 403);

        if (!is_null($user->deleted_at))
            return ApiReturn::ErrorMessage("Usuário Excluído", 410);

        if ($user->status == StatusEnum::INACTIVE)
            return ApiReturn::ErrorMessage("Usuário Desativado", 404);

        $routeName = Route::getCurrentRoute()->getName();
        $routeUrl = $request->getUri();

        $permission->UserhasItem(auth()->user(), $routeName, 'item', $routeUrl, PermissionItemTypeEnum::ROUTE);

        return $next($request);
    }
}
