<?php

namespace Modules\Utils\Criterias;

use Modules\Utils\Enums\StatusEnum;
use Modules\Permission\Enum\PermissionItemTypeEnum;
use Modules\Permission\Repositories\PermissionMapRepository;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class VisibleCriteria.
 *
 * @package namespace Modules\Utils\Criterias;
 */
class VisibleCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $statusArray = $this->getStatus();
        $table = $repository->makeModel()->getTable();
        $query = $model->whereIn("{$table}.status", $statusArray);
      
        if ($this->viewDeleted()) 
            $query->withTrashed()->where("{$table}.deleted_at" ,'!=', null);
        
        return $query;
    }

    private function getStatus()
    {
        $baseStatus = [StatusEnum::ACTIVE];

        if ($this->viewBlocked())
            array_push($baseStatus, StatusEnum::BLOCKED);

        if ($this->viewInactive())
            array_push($baseStatus, StatusEnum::INACTIVE);

        return $baseStatus;
    }

    private function viewDeleted()
    {
        return app(PermissionMapRepository::class)->UserhasItem(auth()->user(), 'status.deleted.view', 'item', '', PermissionItemTypeEnum::ITEM);
    }

    private function viewBlocked()
    {
        return app(PermissionMapRepository::class)->UserhasItem(auth()->user(), 'status.blocked.view', 'item', '', PermissionItemTypeEnum::ITEM);
    }

    private function viewInactive()
    {
        return app(PermissionMapRepository::class)->UserhasItem(auth()->user(), 'status.inactivated.view', 'item', '', PermissionItemTypeEnum::ITEM);
    }
}
