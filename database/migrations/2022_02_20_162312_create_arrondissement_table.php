<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArrondissementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrondissement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( 'department_id');
            $table->foreign( 'department_id')->references( 'id')
                  ->on( 'department')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('arrondissement');
    }
}
