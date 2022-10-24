<?php

namespace Modules\Permission\Repositories\Eloquent;

use Modules\Permission\Entities\PermissionItem;
use Modules\Permission\Repositories\PermissionItemRepository;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class PermissionItemRepositoryEloquent.
 *
 * @package namespace Modules\Permission\Repositories\Eloquent;
 */
class PermissionItemRepositoryEloquent extends RepositoryAbstract implements PermissionItemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PermissionItem::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
