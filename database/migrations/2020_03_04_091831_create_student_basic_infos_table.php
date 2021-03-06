<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentBasicInfosTable extends Migration
{
    public function up()
    {
        Schema::create('student_basic_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('dop');
            $table->string('gender');
            $table->string('previous_school')->nullable();
            $table->string('admission_year');
            $table->string('admission_class');
            $table->string('admission_reason')->nullable();
            $table->bigInteger('created_by')->default(1)->unsigned();
            $table->boolean('active')->default(0)->comment('1 => active, 0 => inactive');
            // foreignkeys
            $table->bigInteger('user_id')->unique()->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // common fields
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('student_basic_infos');
    }
}
