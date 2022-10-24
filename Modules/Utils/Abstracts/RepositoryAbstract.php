<?php

namespace Modules\Utils\Abstracts;

use Modules\Utils\Exceptions\ApiException;
use Modules\Utils\Exceptions\StatusException\BlockedException;
use Modules\Utils\Exceptions\StatusException\InactiveException;
use Modules\Utils\Exceptions\StatusException\NotFoundException;
use Modules\Utils\Exceptions\StatusException\NotDeletableException;
use Modules\Utils\Exceptions\StatusException\NotRecoverableException;
use Modules\Utils\Exceptions\StatusException\NotInactivatableException;

use Modules\Permission\Enum\PermissionItemTypeEnum;
use Modules\Permission\Repositories\PermissionMapRepository;

use Illuminate\Database\Eloquent\Model;
use Modules\Utils\Exceptions\NotBlockableException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

abstract class RepositoryAbstract extends BaseRepository
{
    protected $skipCriteria = false;
    protected $model;
    protected $throwExceptions = true;

    public function __construct($throwExceptions = true)
    {
        $this->throwExceptions = $throwExceptions;
        $this->model = $this->makeModel();
        $this->model->throwExceptions = $throwExceptions;
    }

    public function create(array $attributes)
    {
        $this->checkModel();
        return $this->model->create($attributes);
    }

    //Update Functions
    public function edit(array $attributes)
    {   
        $updatable = $this->Updatable();
        if (is_string($updatable) || !$updatable) 
            return $updatable;

        return $this->model->edit($attributes);
    }

    public function Updatable(): bool
    {
        $permissionRepository = app(PermissionMapRepository::class);

        if ($this->model->isBlocked) {
            if ($permissionRepository->UserhasItem(auth()->user(), 'status.blocked.update', 'item', '', PermissionItemTypeEnum::ITEM))
                return true;
            else {
                if ($this->throwExceptions)
                    throw new BlockedException($this->model->id, $this->model->entityName);

                return "O registro com o código {$this->model->id} do tipo {$this->model->entityName} se encontra bloqueado no momento";
            }
        }

        if ($this->model->isInactive) {
            if ($permissionRepository->UserhasItem(auth()->user(), 'status.inactivated.update', 'item', '', PermissionItemTypeEnum::ITEM))
                return true;
            else {
                if ($this->throwExceptions)
                    throw new InactiveException($this->model->id, $this->model->entityName);

                return "O registro com o código {$this->model->id} do tipo {$this->model->entityName} se encontra inativo no momento";
            }
        }

        return true;
    }

    //Delete Functions
    public function exclude()
    {
        $excludable = $this->Excludable();
        if (is_string($excludable) || !$excludable) 
            return $excludable;

        return $this->model->exclude();
    }

    public function Excludable(): bool
    {
        if ($this->model->isDestroyed)
            throw new NotFoundException($this->model->id, $this->model->entityName);

        if (app(PermissionMapRepository::class)->UserhasItem(auth()->user(), 'status.delete', 'item', '', PermissionItemTypeEnum::ITEM))
            return true;

        if ($this->throwExceptions)
            throw new NotDeletableException($this->model->id, $this->model->entityName);

        return "O registro com o código {$this->model->id} do tipo {$this->model->entityName} não pode ser excluido";
    }

    //Block Functions
    public function block()
    {
        $blockable = $this->Blockable();
        if (is_string($blockable) || !$blockable)
            return $blockable;

        return $this->model->block();
    }

    public function Blockable(): bool
    {
        if ($this->model->isBlocked) {
            if ($this->throwExceptions)
                throw new ApiException("O recurso não pode ser bloqueado pois o mesmo já se encontra bloqueado!");

            return "O recurso não pode ser bloqueado pois o mesmo já se encontra bloqueado!";
        }

        if (app(PermissionMapRepository::class)->UserhasItem(auth()->user(), 'status.block', 'item', '', PermissionItemTypeEnum::ITEM))
            return true;

        if ($this->throwExceptions)
            throw new NotBlockableException($this->model->id, $this->model->entityName);

        return "O registro com o código {$this->model->id} do tipo {$this->model->entityName} não pode ser bloqueado";
    }

    //Recover Functions
    public function recover()
    {
        $recoverable = $this->Recoverable();
        if (is_string($recoverable) || !$recoverable)
            return $recoverable;

        return $this->model->activate();
    }

    public function Recoverable(): bool
    {
        if ($this->model->isActive) {
            if ($this->throwExceptions)
                throw new ApiException("O recurso não pode ser restaurado pois o mesmo já se encontra ativo!");

            return "O recurso não pode ser restaurado pois o mesmo já se encontra ativo!";
        }

        if (app(PermissionMapRepository::class)->UserhasItem(auth()->user(), 'status.recover', 'item', '', PermissionItemTypeEnum::ITEM))
            return true;

        if ($this->throwExceptions)
            throw new NotRecoverableException($this->model->id, $this->model->entityName);

        return "O registro com o código {$this->model->id} do tipo {$this->model->entityName} não pode ser recuperado";
    }

    //Inactivate Functions
    public function inactivate()
    {
        $inactivatable = $this->Inactivatable();
        if (is_string($inactivatable) || !$inactivatable)
            return $inactivatable;

        return $this->model->inactivate();
    }

    public function Inactivatable(): bool
    {
        if ($this->model->isInactive) {
            if ($this->throwExceptions)
                throw new ApiException("O recurso não pode ser inativado pois o mesmo já se encontra inativo!");

            return "O recurso não pode ser inativado pois o mesmo já se encontra inativo!";
        }

        if (app(PermissionMapRepository::class)->UserhasItem(auth()->user(), 'status.inactive', 'item', '', PermissionItemTypeEnum::ITEM))
            return true;

        if ($this->throwExceptions)
            throw new NotInactivatableException($this->model->id, $this->model->entityName);

        return "O registro com o código {$this->model->id} do tipo {$this->model->entityName} não pode ser inativado";
    }

    /**
     * @return Model
     * @throws RepositoryException
     */
    public function makeModel()
    {
        $model = $this->model();
        $model = new $model();

        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }

    protected function checkModel(): Model
    {
        if (is_null($this->model))
            $this->model = $this->makeModel();

        return $this->model;
    }
}
