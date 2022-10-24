<?php

namespace Modules\Permission\Entities;

use Modules\Utils\Abstracts\ModelAbstract;

class PermissionMap extends ModelAbstract
{
    protected $table = 'permission_maps';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'responsable_id',
        'responsable_type',

        'permission_id',
        'permission_type',
    ];

    public function responsable()
    {
        return $this->morphTo('responsable', 'responsable_type', 'responsable_id');
    }

    public function permission()
    {
        return $this->morphTo('permission', 'permission_type', 'permission_id');
    }
    
    protected static function newFactory()
    {
        return \Modules\Permission\Database\Factories\PermissionMapFactory::new();
    }
}
