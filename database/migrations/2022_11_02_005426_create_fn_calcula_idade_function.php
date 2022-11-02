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
        DB::unprepared('CREATE FUNCTION fn_calcula_idade(nascimento DATE)
                            RETURNS INT
                            DETERMINISTIC
                        BEGIN

                            RETURN TIMESTAMPDIFF(YEAR, nascimento, NOW());

                        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION IF EXISTS fn_calcula_idade');
    }
};
