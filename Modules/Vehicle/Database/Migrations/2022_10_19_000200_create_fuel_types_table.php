<?php

use Modules\Utils\Enums\StatusEnum;
use Modules\Vehicle\Enums\FuelTypeEnum;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFueltypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->decimal('price', 11, 2)->default(0.00);
            $table->text('note')->nullable();
            $table->enum('type', FuelTypeEnum::lists())->default(FuelTypeEnum::FLEX);

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
        Schema::dropIfExists('fuel_types');
    }
}
