<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('metricNumber');
            $table->string('email');
            $table->string('sex');
            $table->string('phoneNumber');
            $table->string('level');
            $table->string('sessionOfRegistration');
            $table->string('fingerprint')->nullable();
            $table->string('passport');
            $table->string('systemNumber');
            $table->string('paymentCode');
            $table->string('programType');
            $table->string('department');
            $table->string('faculty');
            $table->integer('course_registration_id')->constrained('course_registrations');
            $table->timestamp('dob')->nullable();
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
        Schema::dropIfExists('students');
    }
};
