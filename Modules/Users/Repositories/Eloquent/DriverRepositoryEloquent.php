<?php

namespace Modules\Users\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;

use Modules\Utils\Criterias\VisibleCriteria;
use Modules\Utils\Abstracts\RepositoryAbstract;

use Modules\Users\Entities\Driver;
use Modules\Users\Repositories\DriverRepository;

/**
 * Class DriverRepositoryEloquent
 *
 * @package namespace Modules\Users\Repositories\Eloquent;
 */
class DriverRepositoryEloquent extends RepositoryAbstract implements DriverRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Driver::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(VisibleCriteria::class));
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
