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
        DB::unprepared("
        create trigger tg_postos_insert_before
            before insert
            on postos
            for each row
        begin
            set NEW.telefone_int = fn_limpa_telefone(NEW.telefone);
        end");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("drop trigger if exists tg_postos_insert_before");
    }
};
