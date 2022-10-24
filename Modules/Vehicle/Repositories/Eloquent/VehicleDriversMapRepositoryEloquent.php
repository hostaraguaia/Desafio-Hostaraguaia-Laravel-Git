<?php

namespace Modules\Vehicle\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;

use Modules\Utils\Criterias\VisibleCriteria;
use Modules\Utils\Abstracts\RepositoryAbstract;

use Modules\Vehicle\Entities\VehicleDriversMap;
use Modules\Vehicle\Repositories\VehicleDriversMapRepository;

/**
 * Class VehicleDriversMapRepositoryEloquent
 *
 * @package namespace Modules\Vehicle\Repositories\Eloquent;
 */
class VehicleDriversMapRepositoryEloquent extends RepositoryAbstract implements VehicleDriversMapRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VehicleDriversMap::class;
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
