<?php

namespace Modules\Units\Repositories\Eloquent;

use Modules\Units\Entities\FuelStation;
use Modules\Utils\Criterias\VisibleCriteria;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Units\Repositories\FuelStationRepository;

use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class FuelStationRepositoryEloquent
 *
 * @package namespace Modules\Units\Repositories\Eloquent;
 */
class FuelStationRepositoryEloquent extends RepositoryAbstract implements FuelStationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FuelStation::class;
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
