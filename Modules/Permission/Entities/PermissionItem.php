<?php

namespace Modules\Permission\Entities;

use Modules\Utils\Abstracts\ModelAbstract;

class PermissionItem extends ModelAbstract
{
    protected $table = 'permission_items';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'code',
        'icon',
        'icon_type',
        'type',
        'status',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Permission\Database\Factories\PermissionItemFactory::new();
    }
}
