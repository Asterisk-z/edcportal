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
        Schema::create('payment_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('IsRepeated')->nullable();
            $table->string('ProductGroupCode');
            $table->string('PaymentLogId');
            $table->string('CustReference');
            $table->string('AlternateCustReference')->nullable();
            $table->string('Amount');
            $table->string('PaymentStatus');
            $table->string('PaymentMethod');
            $table->string('PaymentReference');
            $table->string('TerminalId')->nullable();
            $table->string('ChannelName');
            $table->string('Location')->nullable();
            $table->string('IsReversal');
            $table->string('PaymentDate');
            $table->string('SettlementDate');
            $table->string('InstitutionId');
            $table->string('InstitutionName');
            $table->string('BranchName')->nullable();
            $table->string('BankName')->nullable();
            $table->string('FeeName')->nullable();
            $table->string('CustomerName');
            $table->string('OtherCustomerInfo')->nullable();
            $table->string('ReceiptNo');
            $table->string('CollectionsAccount')->nullable();
            $table->string('ThirdPartyCode')->nullable();
            $table->string('PaymentItems');
            $table->string('BankCode')->nullable();
            $table->string('CustomerAddress')->nullable();
            $table->string('CustomerPhoneNumber')->nullable();
            $table->string('DepositorName')->nullable();
            $table->string('DepositSlipNumber')->nullable();
            $table->string('PaymentCurrency');
            $table->string('OriginalPaymentLogId')->nullable();
            $table->string('OriginalPaymentReference')->nullable();
            $table->string('Teller')->nullable();
            $table->string('transaction_id')->constrained;
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
        Schema::dropIfExists('payment_notifications');
    }
};
