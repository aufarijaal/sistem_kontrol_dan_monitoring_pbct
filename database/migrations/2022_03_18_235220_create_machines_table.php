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
        Schema::create('machines', function (Blueprint $table) {
            $table->string('machineid')->unique()->primary();
            $table->integer('userid')->nullable(true);
            $table->boolean('isactive')->default(false);
            $table->boolean('ishalus')->default(true);
            $table->float('temperature')->default(0);
            $table->float('stockhalus')->default(0);
            $table->float('stockkasar')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
    }
};
