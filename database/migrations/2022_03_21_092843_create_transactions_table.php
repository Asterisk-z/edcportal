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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('department');
            $table->string('regNumber');
            $table->string('systemNumber');
            $table->string('paymentCode');
            $table->string('venture');
            $table->enum('status', ['PAID', 'NOTPAID'])->default('NOTPAID');
            $table->string('items');
            $table->string('totalAmount');
            $table->integer('student_id')->constrained('students');
            $table->string('actualAmount');// without 1.5% of the initial amount and the portal charge
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
        Schema::dropIfExists('transactions');
    }
};
