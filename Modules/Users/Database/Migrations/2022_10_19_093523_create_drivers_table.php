<?php

use Modules\Utils\Enums\StatusEnum;
use Modules\Users\Enums\HiringTypeEnum;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->foreignId('users')->references('id')->on('users')->onDelete('cascade');
            $table->string('document', 18)->nullable();
            $table->string('registration')->nullable();
            $table->bigInteger('licence', false)->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('hiring_type', HiringTypeEnum::lists())->default(HiringTypeEnum::PARCIAL);
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
        Schema::dropIfExists('drivers');
    }
}
