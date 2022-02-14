<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fertilizers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('norm_nitrogen', 16, 2)->nullable();
            $table->decimal('norm_phosphorus', 16, 2)->nullable();
            $table->decimal('norm_potassium', 16, 2)->nullable();
            $table->unsignedBigInteger('culture_id')->nullable();
            $table->string('district')->nullable();
            $table->decimal('cost', 16, 2)->nullable();
            $table->string('description')->nullable();
            $table->string('appointment')->nullable();
            $table->timestamps();

            $table->index('culture_id', 'fertilizer_culture_idx');
            $table->foreign('culture_id', 'fertilizer_culture_fk')->on('cultures')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fertilizers');
    }
}
