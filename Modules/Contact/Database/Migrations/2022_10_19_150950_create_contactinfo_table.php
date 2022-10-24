<?php

use Modules\Utils\Enums\StatusEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_informations', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuidMorphs('responsable');
            $table->string('ddd', 5)->nullable();
            $table->string('phone', 60)->nullable();

            $table->string('ddd_secondary', 5)->nullable();
            $table->string('phone_secondary', 60)->nullable();

            $table->string('ddd_backup', 5)->nullable();
            $table->string('phone_backup', 60)->nullable();
            
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
 
            $table->string('email_secondary')->unique();
            $table->timestamp('email_secondary_verified_at')->nullable();

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
        Schema::dropIfExists('contact_informations');
    }
}
