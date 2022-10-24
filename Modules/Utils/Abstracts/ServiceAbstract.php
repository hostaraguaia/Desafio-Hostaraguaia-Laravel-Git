<?php

namespace Modules\Utils\Abstracts;

use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Utils\Abstracts\FormRequestAbstract;

abstract class ServiceAbstract
{
    abstract public function getRepository(): RepositoryAbstract;
    abstract public function getRequest(): FormRequestAbstract;

    public $entityName;

    public function __construct()
    {
        $model = $this->getRepository()->makeModel();
        $this->entityName = $model->entityName;
    }

    public function create($request)
    {
        return $this->getRepository()->create($request);
    }

    public function datatable(RepositoryAbstract $model, $columns, $perPage, $page)
    {
        return $model->paginate($perPage, $columns, "paginate", $page);
    }

    public function find($id)
    {
        return $this->getRepository()->find($id);
    }

    public function update($request, $id)
    {
        $repository = $this->find($id);
        return $repository->edit($request->all());
    }

    //Delete
    public function destroy($id)
    {
        $repository = $this->find($id);
        return $repository->exclude();
    }

    public function recover($id)
    {
        $repository = $this->find($id);
        return $repository->activate();
    }

    //Inactivate
    public function inactivate($id)
    {
        $repository = $this->find($id);
        return $repository->inactivate();
    }

    public function activate($id)
    {
        $repository = $this->find($id);
        if ($repository->isInactive) return $repository->activate();

        return false;
    }

    //Block
    public function unblock($id)
    {
        $repository = $this->find($id);
        if ($repository->isBlocked) return $repository->activate();

        return false;
    }

    public function block($id)
    {
        $repository = $this->find($id);
        if ($repository->isBlocked) return false;

        return $repository->block();
    }

    //Audit
    public function audit($id)
    {
        $repository = $this->find($id);
        return $repository->audits;
    }
}
