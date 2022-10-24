<?php

namespace Modules\Units\Database\Seeders;

use Modules\Utils\Abstracts\SeederAbstract;
use Illuminate\Database\Eloquent\Model;

class UnitsDatabaseSeeder extends SeederAbstract
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        parent::seed(__DIR__."/permission.json");
    }
}
