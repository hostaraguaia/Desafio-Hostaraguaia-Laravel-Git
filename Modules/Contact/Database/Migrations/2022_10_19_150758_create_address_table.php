<?php

use Modules\Utils\Enums\StatusEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * 
     *  
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->uuidMorphs('responsable');
            $table->string('address', 255)->nullable();
            $table->string('zip_code', 255)->nullable();
            $table->string('complement', 255)->nullable();
            $table->string('district', 255)->nullable();
            $table->string('city', 255)->nullable();

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
        Schema::dropIfExists('addresses');
    }
}
