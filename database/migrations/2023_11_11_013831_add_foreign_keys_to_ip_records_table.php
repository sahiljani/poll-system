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
        Schema::table('ip_records', function (Blueprint $table) {
            $table->foreign(['poll_id'])->references(['id'])->on('polls')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ip_records', function (Blueprint $table) {
            $table->dropForeign('ip_records_poll_id_foreign');
        });
    }
};
