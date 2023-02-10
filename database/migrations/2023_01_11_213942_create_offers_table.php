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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('transport_price');
            $table->string('transport_type');
            $table->string('price_adult');
            $table->string('price_child');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('location_city');
            $table->string('location_state');
            $table->string('location_continent');
            $table->longText('program');
            $table->longText('note');
            $table->enum('is_active', ['0', '1'])->default('1');
            $table->string('img')->nullable();
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
        Schema::dropIfExists('offers');
    }
};
