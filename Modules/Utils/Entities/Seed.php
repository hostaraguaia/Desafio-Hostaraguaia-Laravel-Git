<?php

namespace Modules\Utils\Entities;

use Modules\Utils\Abstracts\ModelAbstract;

class Seed extends ModelAbstract
{
    protected $table = 'seeds';
    protected $primaryKey = 'id';

    protected $fillable = [
        'seed',
        'batch',
    ];
}
