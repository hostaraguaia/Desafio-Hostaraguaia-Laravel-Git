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
        create trigger tg_postos_update_before
            before update
            on postos
            for each row
        begin
            set NEW.telefone_int = fn_limpa_telefone(NEW.telefone);
            update users set name = NEW.nome_fantasia, deleted_at = NEW.deleted_at where id = NEW.user_id;

        end");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("drop trigger if exists tg_postos_update_before");
    }
};
