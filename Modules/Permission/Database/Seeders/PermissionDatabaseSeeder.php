<?php

namespace Modules\Permission\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Modules\Utils\Abstracts\SeederAbstract;
use Modules\Permission\Database\Seeders\PermissionTableSeeder;
use Modules\Permission\Database\Seeders\PermissionMapTableSeeder;
use Modules\Permission\Database\Seeders\PermissionItemTableSeeder;

class PermissionDatabaseSeeder extends SeederAbstract
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PermissionTableSeeder::class);
        $this->call(PermissionItemTableSeeder::class);
        $this->call(PermissionMapTableSeeder::class);
    }
}
