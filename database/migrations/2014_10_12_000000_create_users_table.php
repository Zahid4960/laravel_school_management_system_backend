<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('password_hash');
            $table->string('password');
            $table->tinyInteger('user_type')->nullable();
            $table->boolean('active')->default(0)->comment('0 => deactive, 1 => active');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
