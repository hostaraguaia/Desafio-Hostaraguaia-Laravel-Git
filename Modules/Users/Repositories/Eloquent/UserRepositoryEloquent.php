<?php

namespace Modules\Users\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;

use Modules\Utils\Criterias\VisibleCriteria;
use Modules\Utils\Abstracts\RepositoryAbstract;

use Modules\Users\Entities\User;
use Modules\Users\Repositories\UserRepository;

/**
 * Class UserRepositoryEloquent
 *
 * @package namespace Modules\Users\Repositories\Eloquent;
 */
class UserRepositoryEloquent extends RepositoryAbstract implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
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
