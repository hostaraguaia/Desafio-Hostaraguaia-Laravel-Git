<?php

namespace Modules\Image\Entities;

use Modules\Utils\Abstracts\ModelAbstract;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends ModelAbstract
{
    protected $table = 'images';
    protected $primaryKey = 'id';

    protected $fillable = [
        'responsable_id',
        'responsable_type',
        'base64',
        'name',
        'size',
        'type',
        'status',
    ];

    protected $casts = [
        'base64' => 'array'
    ];

    /**
     * Get the responsable for the image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function responsable(): MorphTo
    {
        return $this->morphTo('responsable', 'responsable_type', 'responsable_id', 'id');
    }
    protected static function newFactory()
    {
        return \Modules\Image\Database\Factories\ImageFactory::new();
    }
}
