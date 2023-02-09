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
        Schema::create('accommodation_offer', function (Blueprint $table) {
            $table->id();
            $table->integer('offer_id')->unsigned()->nullable()->index();
            $table->integer('accommodation_id')->unsigned()->nullable()->index();
            //$table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
            //$table->foreign('accommodation_id')->references('id')->on('accommodations')->onDelete('cascade');
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
        Schema::dropIfExists('accommodation_offer');
    }
};
