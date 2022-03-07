<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( 'arrondissement_id');
            $table->foreign( 'arrondissement_id')->references( 'id')
                  ->on( 'arrondissement')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('description');
            $table->unsignedBigInteger( 'created_by');
            $table->unique( [ 'description', 'created_by']);
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
        Schema::dropIfExists('communes');
    }
}
