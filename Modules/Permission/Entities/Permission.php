<?php

namespace Modules\Permission\Entities;

use Modules\Utils\Abstracts\ModelAbstract;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends ModelAbstract
{
    use HasFactory;

    protected $table = 'permissions';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'icon',
        'icon_type',
    ];
    protected static function newFactory()
    {
        return \Modules\Permission\Database\Factories\PermissionFactory::new();
    }
}
