<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task__bids', function (Blueprint $table) {
            $table->id();
            $table->string('task_id');
            $table->string('freelancer_id');
            $table->string('bid');
            $table->string('status')->nullable();
            $table->string('time');
            $table->integer('time_quantity');
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
        Schema::dropIfExists('task__bids');
    }
}
