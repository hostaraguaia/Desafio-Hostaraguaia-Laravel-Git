<?php

namespace Modules\Authentication\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Modules\Utils\Abstracts\SeederAbstract;

class AuthenticationDatabaseSeeder extends SeederAbstract
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        // $this->call("OthersTableSeeder");
    }
}
