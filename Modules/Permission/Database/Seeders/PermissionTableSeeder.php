<?php

namespace Modules\Permission\Database\Seeders;

use Modules\Permission\Entities\Permission;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();      

        $permissions = [
            [ 'name' => 'Teste'                 , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Administrador'         , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Motorista'             , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Atendente'              , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Presidencia'           , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Desenvolvedor'         , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Logística'             , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Faturamento'           , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Financeiro'            , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Cliente'               , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Suporte'               , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'DBA'                   , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Sistema'               , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Controle de Qualidade' , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Gerente de Contas'     , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Gerente Operacional'   , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Gerente Comercial'     , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Gerente de Contratos'  , 'icon' => NULL ,'icon_type' => NULL ],
            [ 'name' => 'Gerente de Canais'     , 'icon' => NULL ,'icon_type' => NULL ],
        ];

        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        $counter = 0;
        foreach ($permissions as $permission) {
            $save = Permission::create($permission);
            if (is_string($save))
                throw new \Exception($save);
                
            if($this->command)
                $this->command->info("Inserted Permission Group: {$permission['name']} [$counter]\n");
            else
                echo ("Inserted Permission Group: {$permission['name']} [$counter]\n");

            $counter += 1;
        }
        Schema::enableForeignKeyConstraints();
    }
}
