<?php

namespace Modules\Permission\Repositories\Eloquent;

use Modules\Permission\Entities\Permission;
use Modules\Permission\Repositories\PermissionRepository;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class PermissionRepositoryEloquent.
 *
 * @package namespace Modules\Permission\Repositories\Eloquent;
 */
class PermissionRepositoryEloquent extends RepositoryAbstract implements PermissionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
