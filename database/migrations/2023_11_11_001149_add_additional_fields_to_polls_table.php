<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('polls', function (Blueprint $table) {
            //
            $table->boolean('Is_IP_validate')->default(true);
            $table->boolean('Is_browser_validate')->default(true);
            $table->text('share_message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('polls', function (Blueprint $table) {
            //
            $table->dropColumn('Is_IP_validate');
            $table->dropColumn('Is_browser_validate');
            $table->dropColumn('share_message');
        });
    }
};
