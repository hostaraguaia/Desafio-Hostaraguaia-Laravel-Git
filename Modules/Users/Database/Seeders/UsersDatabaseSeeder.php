<?php

namespace Modules\Users\Database\Seeders;

use Modules\Utils\Abstracts\SeederAbstract;
use Illuminate\Database\Eloquent\Model;

class UsersDatabaseSeeder extends SeederAbstract
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(TestUserTableSeeder::class);
        parent::seed(__DIR__."/permission.json");
    }
}
