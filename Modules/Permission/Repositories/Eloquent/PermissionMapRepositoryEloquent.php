<?php

namespace Modules\Permission\Repositories\Eloquent;

use Modules\Users\Entities\User;
use Modules\Utils\Abstracts\RepositoryAbstract;

use Modules\Permission\Entities\Permission;
use Modules\Permission\Entities\PermissionMap;
use Modules\Permission\Entities\PermissionItem;
use Modules\Permission\Enum\PermissionItemTypeEnum;
use Modules\Permission\Exceptions\PermissionItemNotFound;
use Modules\Permission\Repositories\PermissionMapRepository;

use Modules\Utils\Exceptions\ApiException;
use Modules\Utils\Exceptions\RouteNotFoundException;

use Exception;
use Illuminate\Support\Fluent;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class PermissionMapRepositoryEloquent.
 *
 * @package namespace Modules\Permission\Utils\Repositories\Eloquent;
 */
class PermissionMapRepositoryEloquent extends RepositoryAbstract implements PermissionMapRepository
{
    public $throwable = true;

    /**
     * Construct
     *
     * @return string
     */
    public function __construct(bool $throwable = true)
    {
        $this->$throwable = $throwable;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PermissionMap::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function setThrowable(bool $throwable = true)
    {
        $this->throwable = $throwable;
    }

    public function UserhasItem(User $user, $route, String $routeUrl, $type = PermissionItemTypeEnum::ROUTE)
    {
        $serachRoute = $route;

        if (!$route instanceof PermissionItem) {
            if (is_string($route)) {
                $route = app(PermissionItem::class)->where('code', $route)->first();

                if (is_null($route)) {
                    if ($this->throwable) {
                        if ($type == PermissionItemTypeEnum::ROUTE)
                            throw new RouteNotFoundException($serachRoute);
                        else
                            throw new PermissionItemNotFound($serachRoute);
                    }

                    return false;
                }

                return true;
            }
            if ($this->throwable)
                throw new Exception('$route must bee an instace of PermissionItem or String');

            return false;
        }

        $group = $this->getUserGroup($user);

        if ($group instanceof Permission)
            return $this->hasItem($route, $group, $type);

        if ($this->throwable)
            throw new ApiException("O usuario não tem permissão à rota '{$routeUrl}'", 401);

        return false;
    }

    public function getUserGroup(User $user)
    {
        $map = app($this->model())
            ->where('responsable_type', get_class($user))
            ->where('responsable_id', $user->id)
            ->where('permission_type', Permission::class)
            ->first();

        if (is_null($map)) {
            if ($this->throwable)
                throw new ApiException("Usuario não cadastrado em grupo de permissão valido", 401);

            return false;
        }

        if ($map->permission_type == get_class(app(Permission::class)))
            return app(Permission::class)->find($map->permission_id);

        if ($this->throwable)
            throw new ApiException("Não foi possivel localizar um grupo de permissões para o Usuario", 401);

        return false;
    }

    public function hasGroup(Model $item, Model $group)
    {
        $map = app($this->model())
            ->where('responsable_type', get_class($item))
            ->where('responsable_id', $item->id)
            ->where('permission_type', get_class($group))
            ->where('permission_id', $group->id)
            ->first();

        if (empty($map))
            return false;

        return $map;
    }

    public function hasItem(Model $item, Model $group)
    {
        $map = app($this->model())
            ->where('responsable_type', get_class($group))
            ->where('responsable_id', $group->id)
            ->where('permission_type', get_class($item))
            ->where('permission_id', $item->id)
            ->first();

        if (empty($map))
            return false;

        return $map;
    }

    public function groupItems(Permission $group)
    {
        $items = app($this->model())
            ->where('responsable_type', get_class($group))
            ->where('responsable_id', $group->id)
            ->where('permission_type', PermissionItem::class)
            ->get();

        if (empty($items))
            return false;

        return $items;
    }

    public function userItems(User $user)
    {
        $items = app($this->model())
            ->where('responsable_type', get_class($user))
            ->where('responsable_id', $user->id)
            ->where('permission_type', PermissionItem::class)
            ->get();

        if (empty($items))
            return false;

        return $items;
    }

    public function getUserPermissionList(User $user)
    {
        $permissions = [];

        $userGroup = $this->getUserGroup($user);
        if (!$userGroup)
            return [];

        $groupItems = $this->groupItems($userGroup);
        if (!$groupItems)
            return [];

        $userItems = $this->userItems($user);
        if (!$userItems)
            return [];

        $items = $userItems->toArray() + $groupItems->toArray();

        if (!is_null($items)) {
            foreach ($items as $item) {
                $item = new Fluent($item);
                if ($item->permission_type == get_class(app(PermissionItem::class))) {
                    $permissionItem = app(PermissionItem::class)
                        ->where('type', PermissionItemTypeEnum::ROUTE)
                        ->find($item->permission_id, ['code']);

                    if (!is_null($permissionItem))
                        array_push($permissions, $permissionItem->code);
                }
            }
        }
        return $permissions;
    }
}
