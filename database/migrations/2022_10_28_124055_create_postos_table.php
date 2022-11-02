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
        Schema::create('postos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
            $table->string("nome_fantasia");
            $table->string("razao_social");
            $table->string("cnpj",18);
            $table->string("logradouro")->nullable();
            $table->string("cep",10)->nullable();
            $table->string("complemento")->nullable();
            $table->string("bairro")->nullable();
            $table->string("cidade")->nullable();
            $table->char("uf",2)->nullable();
            $table->string("responsavel")->nullable();
            $table->string("telefone")->nullable();
            $table->bigInteger("telefone_int")->nullable();
            $table->string("email")->nullable();
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
        Schema::dropIfExists('postos');
    }
};
