<?php

namespace Modules\Authentication\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;

use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Authentication\Entities\RequestLog;
use Modules\Authentication\Repositories\RequestLogRepository;

/**
 * Class RequestLogRepositoryEloquent.
 *
 * @package namespace Modules\Authentication\Repositories\Eloquent;
 */
class RequestLogRepositoryEloquent extends RepositoryAbstract implements RequestLogRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RequestLog::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
