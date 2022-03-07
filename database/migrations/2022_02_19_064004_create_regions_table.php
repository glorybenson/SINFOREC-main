<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( 'pay_id');
            $table->foreign( 'pay_id')->references( 'id')
                  ->on( 'pays')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('description');
            $table->unsignedBigInteger('created_by');
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
        Schema::dropIfExists('regions');
    }
}
