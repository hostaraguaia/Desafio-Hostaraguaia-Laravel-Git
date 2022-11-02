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
        create trigger tg_motoristas_update_before
            before update
            on motoristas
            for each row
        begin
            set NEW.telefone_int = fn_limpa_telefone(NEW.telefone);
            set NEW.celular_1_int = fn_limpa_telefone(NEW.celular_1);
            set NEW.celular_2_int = fn_limpa_telefone(NEW.celular_2);

            update users set name = NEW.nome, deleted_at = NEW.deleted_at where id = NEW.user_id;

            if(NEW.nascimento is not null) then
                set NEW.idade = fn_calcula_idade(NEW.nascimento);
            else
                set NEW.idade = null;
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
        DB::unprepared("drop trigger if exists tg_motoristas_update_before");
    }
};
