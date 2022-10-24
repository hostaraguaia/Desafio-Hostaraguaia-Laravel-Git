<?php

namespace Modules\Permission\Services;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Utils\Abstracts\FormRequestAbstract;
use Modules\Permission\Http\Requests\PermissionItemRequest;
use Modules\Permission\Repositories\PermissionItemRepository;


class PermissionItemService extends ServiceAbstract
{
    public function getRepository(): RepositoryAbstract
    {
        return app(PermissionItemRepository::class);
    }

    public function getRequest(): FormRequestAbstract
    {
        return app(PermissionItemRequest::class);
    }

    public function create($item)
    {
        $items = [];

        if (is_array($item)) {
            foreach ($item as $element) {
                if (!is_array($element))
                    $element = (array) $element;

                $item = $this->getRepository()->where('code', $element['code'])->first();
                if (is_null($item))
                    $item = $this->getRepository()->create((array)$element);
                else
                    $item = $this->getRepository()->update((array)$element, $item->id);

                array_push($items, $item);
            }
            return $items;
        }

        $created = $this->getRepository()->create((array)$item);
        array_push($items, $created);

        return $items;
    }
}
