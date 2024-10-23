<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginsTable extends Migration
{
    public function up()
    {
        Schema::create('logins', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('username')->unique(); // Unique username
            $table->string('password');
            $table->string('usertype');// Password field
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('logins');
    }
}
