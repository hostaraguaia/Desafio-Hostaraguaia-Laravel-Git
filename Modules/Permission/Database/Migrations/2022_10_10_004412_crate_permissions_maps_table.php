<?php

use Modules\Utils\Enums\StatusEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_maps', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('responsable_type', 255);
            $table->char('responsable_id', 36);

            $table->string('permission_type', 255);
            $table->char('permission_id', 36);

            $table->enum('status', StatusEnum::keys())->default(StatusEnum::ACTIVE);
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
        Schema::dropIfExists('permission_maps');
    }
};
