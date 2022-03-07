<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( 'region_id');
            $table->foreign( 'region_id')->references( 'id')
                ->on( 'regions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('description')->unique();
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
        Schema::dropIfExists('department');
    }
}
