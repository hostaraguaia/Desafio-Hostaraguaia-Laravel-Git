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
        Schema::create('requests_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('situation', 100)->default('successful');

            $table->text('route')->nullable();
            $table->json('user_agent')->nullable();
            $table->smallInteger('code')->nullable();
            $table->text('type')->nullable();

            $table->json('body')->nullable();
            $table->json('header')->nullable();
            $table->json('response')->nullable();

            $table->text('token')->nullable();
            $table->text('url')->nullable();
            $table->text('ip')->nullable();
            $table->text('mac')->nullable();
            $table->text('location')->nullable();

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
        Schema::dropIfExists('requests_logs');
    }
};
