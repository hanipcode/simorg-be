<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organ_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organ_id')->nullable()->constrained();
            $table->foreignId('member_id')->constrained();
            $table->string('organ_name');
            $table->string('title');
            $table->integer('year_start');
            $table->integer('year_end');
            $table->boolean('is_muhammadiyah')->default(false);
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
        Schema::dropIfExists('organ_histories');
    }
}
