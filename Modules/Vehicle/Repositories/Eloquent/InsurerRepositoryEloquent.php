<?php

namespace Modules\Vehicle\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;

use Modules\Utils\Criterias\VisibleCriteria;
use Modules\Utils\Abstracts\RepositoryAbstract;

use Modules\Vehicle\Entities\Insurer;
use Modules\Vehicle\Repositories\InsurerRepository;

/**
 * Class InsurerRepositoryEloquent
 *
 * @package namespace Modules\Vehicle\Repositories\Eloquent;
 */
class InsurerRepositoryEloquent extends RepositoryAbstract implements InsurerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Insurer::class;
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
