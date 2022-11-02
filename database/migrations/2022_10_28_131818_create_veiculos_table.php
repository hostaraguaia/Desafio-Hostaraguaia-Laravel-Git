<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("motorista_id")->constrained("motoristas")->cascadeOnDelete();
            $table->foreignId("tipo_combustivel_id")->constrained("tipo_combustiveis")->cascadeOnDelete();
            $table->enum("tipo_veiculo",['Ônibus','Carro','Moto']);
            $table->enum("propriedade",['Própria','Terceirizado']);
            $table->string("placa");
            $table->string("marca")->nullable();
            $table->string("modelo")->nullable();
            $table->year("ano_fabricacao");
            $table->bigInteger("chassi")->nullable();
            $table->bigInteger("renavam")->nullable();
            $table->string("cor")->nullable();
            $table->tinyInteger("consumo_medio")->nullable();
            $table->string("observacoes")->nullable();
            $table->smallInteger("tanque_capacidade")->nullable();
            $table->mediumInteger("limite_troca_oleo")->nullable();
            $table->string("seguradora")->nullable();
            $table->decimal("valor_limite_mes")->nullable();
            $table->date("data_proximo_licenciamento")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
};
