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
        Schema::create('polls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question');
            $table->string('image_url')->nullable();
            $table->string('unique_identifier')->unique();
            $table->timestamps();
            $table->unsignedBigInteger('views')->default(0);
            $table->boolean('Is_IP_validate')->default(true);
            $table->boolean('Is_browser_validate')->default(true);
            $table->text('share_message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polls');
    }
};
