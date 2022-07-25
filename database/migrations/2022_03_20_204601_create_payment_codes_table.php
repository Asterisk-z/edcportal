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
        Schema::create('payment_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrainted('users');
            $table->string('schoolFeeCode');
            $table->string('schoolFeeAmount');
            $table->enum('schoolFeeStatus', ['NotPaid', 'Paid', 'Pending'])->default('NotPaid');
            $table->string('acceptanceFeeCode');
            $table->string('acceptanceFeeAmount');
            $table->enum('acceptanceFeeStatus', ['NotPaid', 'Paid', 'Pending'])->default('NotPaid');
            $table->string('departmentalFeeCode');
            $table->string('departmentalFeeAmount');
            $table->enum('departmentalFeeStatus', ['NotPaid', 'Paid', 'Pending'])->default('NotPaid');
            $table->string('hostelFeeCode');
            $table->string('hostelFeeAmount');
            $table->enum('hostelFeeStatus', ['NotPaid', 'Paid', 'Pending'])->default('NotPaid');
            $table->string('session');
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
        Schema::dropIfExists('payment_codes');
    }
};
