<?php

namespace Modules\Users\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;

use Modules\Utils\Criterias\VisibleCriteria;
use Modules\Utils\Abstracts\RepositoryAbstract;

use Modules\Users\Entities\Attendant;
use Modules\Users\Repositories\AttendantRepository;

/**
 * Class AttendantRepositoryEloquent
 *
 * @package namespace Modules\Users\Repositories\Eloquent;
 */
class AttendantRepositoryEloquent extends RepositoryAbstract implements AttendantRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Attendant::class;
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
