<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('employees', function (Blueprint $table) {
        $table->timestamps(); // Adds created_at and updated_at columns
    });
}

public function down()
{
    Schema::table('employees', function (Blueprint $table) {
        $table->dropTimestamps(); // Removes created_at and updated_at columns
    });
}

}
