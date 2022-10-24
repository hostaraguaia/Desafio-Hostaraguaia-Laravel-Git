<?php

namespace Modules\Authentication\Entities;

use Modules\Utils\Abstracts\ModelAbstract;

class RequestLog extends ModelAbstract
{
    protected $table = 'requests_logs';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'route',
        'user_agent',
        'status',
        'code',
        'url',
        'type',
        'body',
        'header',
        'response',
        'token',
        'url',
        'ip',
        'mac',
        'location',
    ];

    protected static function newFactory()
    {
        return \Modules\Authentication\Database\Factories\RequestLogFactory::new();
    }
}
