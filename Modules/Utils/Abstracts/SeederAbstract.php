<?php

namespace Modules\Utils\Abstracts;

use Modules\Utils\Entities\Seed;
use Modules\Permission\Services\PermissionMapService;
use Modules\Permission\Services\PermissionItemService;

use Illuminate\Database\Seeder;

class SeederAbstract extends Seeder
{
    public function call($class, $silent = false, array $parameters = [])
    {
        $seeded = Seed::where('seed', $class)->first();
        if (is_null($seeded)) {
            $save = parent::call($class, $silent, $parameters);
            Seed::create(['seed' => $class]);
            return "\033[0;32m Seeded [$class] \n";
        }
        echo "\033[0;32mAlready Seeded [$class] \n";
        return null;
    }

    /**
     * Run the current database seeder file.
     *
     * @return void
     */
    public function seed($path = null)
    {
        if (is_null($path))
            $path = __DIR__ . "/permission.json";

        if (!file_exists($path)) {
            echo ("Permissions file not found: $path\n");
            return "Permissions file not found: $path\n";
        }

        $json = json_decode(file_get_contents($path));
        $permissions = $json->permissions;
        $group = $json->group;

        if (empty($permissions)) {
            echo ("No Permissions in file $path\n");
            return "No Permissions in file $path\n";
        }

        if (empty($group)) {
            echo ("No Groups in file $path\n");
            return "No Groups in file $path\n";
        }   

        $items = app(PermissionItemService::class)->create((array)$permissions);
        $save = app(PermissionMapService::class)->associate($items, $group);

        if (is_array($save)) {
            foreach ($save as $item)
                echo (implode(",", $item) . "\n");
        } else
            echo ($save . "\n");

        return $save;
    }
}
