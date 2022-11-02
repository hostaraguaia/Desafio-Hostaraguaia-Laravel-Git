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
        Schema::create('motoristas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
            $table->string("nome");
            $table->string("cpf")->nullable();
            $table->string("matricula")->nullable();
            $table->integer("cnh")->nullable();
            $table->integer("idade")->nullable();
            $table->string("telefone")->nullable();
            $table->bigInteger("telefone_int")->nullable();
            $table->string("tipo_contratacao")->nullable();
            $table->string("celular_1")->nullable();
            $table->bigInteger("celular_1_int")->nullable();
            $table->string("celular_2")->nullable();
            $table->bigInteger("celular_2_int")->nullable();
            $table->string("email")->nullable();
            $table->boolean("ativo")->default(0);
            $table->date("nascimento")->nullable();
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
        Schema::dropIfExists('motoristas');
    }
};
