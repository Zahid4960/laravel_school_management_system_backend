<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentBasicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_basic_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('username');
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('dop');
            $table->string('sex');
            $table->string('previous_school')->nullable();
            $table->string('admission_year');
            $table->string('admission_class');
            $table->string('admission_reason')->nullable();
            $table->boolean('active')->default(0)->comment('0 => active, 1 => inactive');
            $table->bigInteger('user_id')->unsigned()->index();

            // foreignkeys
            $table->foreign('user_id')->references('id')->on('users');

            // common fields
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
        Schema::dropIfExists('student_basic_infos');
    }
}
