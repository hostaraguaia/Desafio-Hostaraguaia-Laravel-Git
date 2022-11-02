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
        Schema::create('nivel_gates', function (Blueprint $table) {
            $table->id();
            $table->foreignId("nivel_id")->constrained("niveis")->cascadeOnDelete();
            $table->foreignId("gate_id")->constrained("gates")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nivel_gates');
    }
};
