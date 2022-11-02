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
        create trigger tg_motoristas_insert_before
            before insert
            on motoristas
            for each row
        begin
            set NEW.telefone_int = fn_limpa_telefone(NEW.telefone);

            if(NEW.nascimento is not null) then
                set NEW.idade = fn_calcula_idade(NEW.nascimento);
            end if;
        end");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("drop trigger if exists tg_motoristas_insert_before");
    }
};
