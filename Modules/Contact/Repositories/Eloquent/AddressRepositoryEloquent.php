<?php

namespace Modules\Contact\Repositories\Eloquent;

use Modules\Contact\Entities\Address;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Contact\Repositories\AddressRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class AddressRepositoryEloquent
 *
 * @package namespace Modules\Contact\Repositories\Eloquent;
 */
class AddressRepositoryEloquent extends RepositoryAbstract implements AddressRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Address::class;
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
