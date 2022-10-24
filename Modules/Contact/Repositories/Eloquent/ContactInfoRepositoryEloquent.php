<?php

namespace Modules\Contact\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;

use Modules\Contact\Entities\ContactInfo;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Contact\Repositories\ContactInfoRepository;

/**
 * Class ContactInfoRepositoryEloquent
 *
 * @package namespace Modules\Contact\Repositories\Eloquent;
 */
class ContactInfoRepositoryEloquent extends RepositoryAbstract implements ContactInfoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ContactInfo::class;
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
