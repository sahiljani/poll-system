<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('CreatePageAds1')->nullable();
            $table->text('HomePageAds1')->nullable();
            $table->text('SharePageAds1')->nullable();
            $table->text('ShowPageAds1')->nullable();
            $table->text('showVotePageAds1')->nullable();
            $table->text('CreatePageAds2')->nullable();
            $table->text('HomePageAds2')->nullable();
            $table->text('SharePageAds2')->nullable();
            $table->text('ShowPageAds2')->nullable();
            $table->text('showVotePageAds2')->nullable();
            $table->text('CreatePageAds3')->nullable();
            $table->text('HomePageAds3')->nullable();
            $table->text('SharePageAds3')->nullable();
            $table->text('ShowPageAds3')->nullable();
            $table->text('showVotePageAds3')->nullable();
            $table->text('header')->nullable();
            $table->text('footer')->nullable();
        });

    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
