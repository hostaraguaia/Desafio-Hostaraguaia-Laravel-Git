<?php

use Modules\Utils\Enums\StatusEnum;
use Modules\Vehicle\Enums\VehicleTypeEnum;
use Modules\Vehicle\Enums\VehicleCategoryEnum;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /*

    - Tipo Veiculo: Ônibus, Carro, Moto  (Select)
    - Propriedade: Própria, Tercerizado  (Select)
    - Placa (Campo Texto)
    
    - Marca (Campo Texto) Campo Não Obrigatório
    - Modelo (Campo Texto) Campo Não Obrigatório

    - Ano de Fabricação (Campo Numérico)
    - Chassi  - (Campo Numérico) Campo Não Obrigatório
    - Renavam (Campo Numérico) Campo Não Obrigatório

    - Cor (Campo Texto) Campo Não Obrigatório
    - Consumo Médio  (Campo Numérico) Campo Não Obrigatório
    - Data Próximo Licenciamento (Campo Data) Campo Não Obrigatório
    - Valor Limite por mês (Campo Valor) Campo Não Obrigatório
    - Observação  do Veículos - Campo Não Obrigatório

    - Tanque Capacidade (Campo Numérico Máximo 3 Dígitos) Campo Não Obrigatório
    - Limite de Troca de Óleo (Campo Numérico Máximo 5 Dígitos) Campo Não Obrigatório
    - Condutor (Select) 
    - SEGURADORA
    */

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->enum('type', VehicleTypeEnum::lists())->default(VehicleTypeEnum::AUTOMOVEL);
            $table->enum('category', VehicleCategoryEnum::lists())->default(VehicleCategoryEnum::PARTICULAR);
            
            $table->text('license_plate');
            $table->text('brand')->nullable();
            $table->text('model')->nullable();

            $table->integer('manufacture_year', false)->nullable()->length(5);
            $table->integer('chassis_number', false)->nullable()->length(25);
            $table->bigInteger('identifier_code', false)->nullable();

            $table->text('color')->nullable();
            $table->integer('average_consumption')->nullable()->unsigned();
            $table->decimal('monthly_limit_value', 11, 2)->default(0.00);
            $table->timestamp('next_licensing')->nullable();
            $table->text('notes')->nullable();

            $table->integer('tank_capacity', false)->nullable()->length(3);
            $table->integer('oil_change_limit', false)->nullable()->length(5);

			$table->foreignUuid('fuel')->references('id')->on('fuel_types');
			$table->foreignUuid('insurer')->references('id')->on('insurers');

            $table->enum('status', StatusEnum::lists())->default(StatusEnum::ACTIVE);
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
        Schema::dropIfExists('vehicles');
    }
}
