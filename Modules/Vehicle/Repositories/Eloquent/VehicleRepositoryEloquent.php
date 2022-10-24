<?php

namespace Modules\Vehicle\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;

use Modules\Utils\Criterias\VisibleCriteria;
use Modules\Utils\Abstracts\RepositoryAbstract;

use Modules\Vehicle\Entities\Vehicle;
use Modules\Vehicle\Repositories\VehicleRepository;

/**
 * Class VehicleRepositoryEloquent
 *
 * @package namespace Modules\Vehicle\Repositories\Eloquent;
 */
class VehicleRepositoryEloquent extends RepositoryAbstract implements VehicleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Vehicle::class;
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
