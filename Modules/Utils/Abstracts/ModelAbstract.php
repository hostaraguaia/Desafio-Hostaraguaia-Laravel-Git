<?php

namespace Modules\Utils\Abstracts;

use Modules\Utils\Enums\StatusEnum;
use Modules\Utils\Traits\UuidKeyTrait;
use Modules\Utils\Traits\ValidatingTrait;
use Modules\Utils\Traits\HasTranslationsTrait;

use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

abstract class ModelAbstract extends Model implements Transformable, AuditableContract
{
    use Auditable;
    use HasFactory;
    use SoftDeletes;
    use UuidKeyTrait;
    use ValidatingTrait;
    use TransformableTrait;
    use HasTranslationsTrait;

    protected $auditHide = [];
    protected $auditTranslate = [];
    protected $auditTranslateValue = [];

    /**
     * Whether the model should throw a Exception if it fails to complete the operation.
     *
     * @var bool
     */
    public $throwExceptions = true;

    /**
     * The default rules that the model will validate against.
     *
     * @var array
     */
    protected $rules = [];

    /**
     * {@inheritdoc}
     */
    public $translatable = [];

    /**
     *
     * Eloquent model events
     *
     * @var array
     */
    protected $dispatchesEvents = [];

    /**
     * {@inheritdoc}
     */
    protected $observables = [
        'validating',
        'validated',
    ];

    /**
     * {@inheritdoc}
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Update the resource.
     *
     * @return Model
     */
    public function edit($data)
    {
        DB::beginTransaction();
        try {
            if ($this->update($data)) {
                DB::commit();
                return $this;
            }
            DB::rollback();
            return 'unable to save';
        } catch (\Exception $error) {
            DB::rollback();
            return $error->getMessage();
        }
    }

    /**
     * Exclude the resource.
     *
     */
    public function exclude()
    {
        DB::beginTransaction();
        try {
            if ($this->destroy($this->id)) {
                DB::commit();
                return $this;
            }
            DB::rollback();
            return 'unable to save';
        } catch (\Exception $error) {
            DB::rollback();
            return $error->getMessage();
        }
    }

    /**
     * Activate the resource.
     *  
     * Search before restoring like: @var Model::withTrashed()->find($id);
     * 
     * @return Model
     */
    public function activate()
    {
        if (!is_null($this->deleted_at)) {
            $recovered = $this->restore();

            $edit = $this->edit(['status' => StatusEnum::ACTIVE]);
            return $recovered && $edit;
        }

        return $this->edit(['status' => StatusEnum::ACTIVE]);
    }

    /**
     * Deactivate the resource.
     *
     * @return Model
     */
    public function deactivate()
    {
        $edit = $this->edit(['status' => StatusEnum::INACTIVE]);
        return $edit;
    }

    /**
     * Block the resource.
     *
     * @return Model
     */
    public function block()
    {
        $edit = $this->edit(['status' => StatusEnum::BLOCKED]);
        return $edit;
    }

    public function setThrowExceptions(bool $throwExceptions)
    {
        $this->throwExceptions = $throwExceptions;
    }

    public function validate(array $data)
    {
        $validator = Validator::make($data, $this->rules);
        return $validator->fails() ? $validator->messages()->get('*') : null;
    }

    public function getEntityNameAttribute()
    {
        $entity = class_basename($this);
        $entity = strtolower($entity);
        return $entity;
    }

    public function getEntityStatusAttribute()
    {
        return $this->status;
    }

    public function getIsActiveAttribute()
    {
        return $this->status == StatusEnum::ACTIVE;
    }

    public function getIsDestroyedAttribute()
    {
        return !is_null($this->deleted_at);
    }

    public function getIsBlockedAttribute()
    {
        return $this->status == StatusEnum::BLOCKED;
    }

    public function getIsInactiveAttribute()
    {
        return $this->status == StatusEnum::INACTIVE;
    }
}
