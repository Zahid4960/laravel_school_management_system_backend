<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToUserTypes extends Migration
{

    public function up()
    {
        Schema::table('user_types', function (Blueprint $table) {
            $table->integer('status')->default(0);
        });
    }


    public function down()
    {
        Schema::table('user_types', function (Blueprint $table) {
            $table->dropColumn(['status']);
        });
    }
}
