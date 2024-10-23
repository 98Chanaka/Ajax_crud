<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('employees', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->date('birthday');
        $table->string('gender');
        $table->string('mobile_number');
        $table->json('status')->nullable(); // Assuming you're using JSON for status
        $table->timestamps(); // This will create created_at and updated_at columns
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
