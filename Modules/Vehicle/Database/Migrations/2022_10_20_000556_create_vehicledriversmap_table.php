<?php

use Modules\Utils\Enums\StatusEnum;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicledriversmapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_drivers_maps', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->uuid('driver');
			$table->foreign('driver')->references('id')->on('drivers');

            $table->uuid('vehicle');
			$table->foreign('vehicle')->references('id')->on('vehicles');

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
        Schema::dropIfExists('vehicle_drivers_maps');
    }
}
