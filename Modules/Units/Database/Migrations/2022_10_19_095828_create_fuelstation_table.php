<?php

use Modules\Utils\Enums\StatusEnum;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelstationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuelstation', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('company_name');
            $table->string('trading_name');

            $table->string('document', 18);
            $table->timestamp('verified_at')->nullable();
            $table->foreignId('loggable')->references('id')->on('users')->onDelete('cascade')->nullable();
            
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
        Schema::dropIfExists('fuelstation');
    }
}
