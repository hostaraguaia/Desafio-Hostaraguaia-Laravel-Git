<?php

namespace Modules\Vehicle\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;

use Modules\Utils\Criterias\VisibleCriteria;
use Modules\Utils\Abstracts\RepositoryAbstract;

use Modules\Vehicle\Entities\FuelType;
use Modules\Vehicle\Repositories\FuelTypeRepository;

/**
 * Class FuelTypeRepositoryEloquent
 *
 * @package namespace Modules\Vehicle\Repositories\Eloquent;
 */
class FuelTypeRepositoryEloquent extends RepositoryAbstract implements FuelTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FuelType::class;
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
