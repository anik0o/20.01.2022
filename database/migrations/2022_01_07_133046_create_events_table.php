<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('start_day');
            $table->date('end_day');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('status');
            $table->foreignId('owner_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreignId('group_id')->references('id')->on('groups')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
