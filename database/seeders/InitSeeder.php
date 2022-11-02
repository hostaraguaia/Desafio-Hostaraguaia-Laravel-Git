<?php

namespace Database\Seeders;

use Crud\Domain\Gate\Models\Gate;
use Crud\Domain\Nivel\Models\Nivel;
use Crud\Domain\NivelGate\Models\NivelGate;
use Crud\Domain\User\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->criaNiveis();

        $this->criaAdmin();

        $this->criaGates();

        $this->criaPermissoes();
    }

    private function criaNiveis()
    {
        Nivel::create(['nome' => 'Administrador', 'gate' => 'admin']);
        Nivel::create(['nome' => 'Padrão', 'gate' => 'padrao']);
        Nivel::create(['nome' => 'Posto', 'gate' => 'posto']);
        Nivel::create(['nome' => 'Frentista', 'gate' => 'frentista']);
        Nivel::create(['nome' => 'Motorista', 'gate' => 'motorista']);
    }

    private function criaAdmin()
    {
        User::create([
            'nivel_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@crud.com.br',
            'username' => 'admin',
            'password' => Hash::make('123456')
        ]);
    }

    private function criaGates()
    {
        // Criando Gates
        Schema::disableForeignKeyConstraints();
        Gate::query()->truncate();
        Schema::enableForeignKeyConstraints();

        $rotas = [
            'usuarios',
            'postos',
            'frentistas',
            'motoristas',
            'veiculos',
            'combustiveis',
        ];

        foreach ($rotas as $rota) {
            Gate::create(['nome' => $rota]);

            Gate::create(['nome' => $rota . '.novo']);
            Gate::create(['nome' => $rota . '.lixeira']);

            if ($rota === 'motoristas')
                Gate::create(['nome' => $rota . '.relatorio']);


            # Icones da Lista
            Gate::create(['nome' => $rota . '.ver']);
            Gate::create(['nome' => $rota . '.editar']);
            Gate::create(['nome' => $rota . '.delete']);

            # Icones da Lixeira
            Gate::create(['nome' => $rota . '.restaurar']);
        }
    }





    private function criaPermissoes()
    {
        Schema::disableForeignKeyConstraints();
        NivelGate::query()->truncate();
        Schema::enableForeignKeyConstraints();
        // Permissões ao admin
        for ($i = 1; $i <= Gate::query()->count(); $i++) {
            NivelGate::create([
                'nivel_id' => 1,
                'gate_id' => $i,
            ]);
        }


        // Permissões ao usuario padrão
        for ($i = 8; $i <= Gate::query()->count(); $i++) {
            NivelGate::create([
                'nivel_id' => 2,
                'gate_id' => $i,
            ]);
        }


        // Permissões ao posto
        for ($i = 15; $i <= Gate::query()->count(); $i++) {
            NivelGate::create([
                'nivel_id' => 3,
                'gate_id' => $i,
            ]);
        }


        // Permissões ao Frentista
        for ($i = 22; $i <= Gate::query()->count(); $i++) {
            if (
                $i != 24 && $i != 25 && $i != 27 && $i != 28 &&
                $i != 32 && $i != 34 && $i != 35 && $i != 36 &&
                $i != 38 && $i != 39 && $i != 41 && $i != 42 && $i != 43
            )
                NivelGate::create([
                    'nivel_id' => 4,
                    'gate_id' => $i,
                ]);
        }


        // Permissões ao Motorista
        for ($i = 30; $i <= 37; $i++) {
            NivelGate::create([
                'nivel_id' => 5,
                'gate_id' => $i,
            ]);
        }
    }

}
