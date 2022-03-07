<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centre', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('arrondissements');
            $table->string('departments');
            $table->string('regions');
            $table->string('communes');
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
        Schema::dropIfExists('centre');
    }
}
