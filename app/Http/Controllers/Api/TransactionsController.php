<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\PaymentNotification;
use App\Models\Transaction;
use App\Models\Venture;
use App\Service\ArrayToXml;
use Exception;
use Illuminate\Http\Request;
use Str;

class TransactionsController extends Controller
{

    public $data;

    public const HEADER =  [
        "Content-Type" => 'text/xml'
    ];
    public const VALID =  0;
    public const INVALID =  1;
    public const EXPIRED =  2;


    public function index(Request $request)
    {

        try {
            $data = json_decode(
                        json_encode(
                            simplexml_load_string($request->getContent())
                        ), 1
                    );


            if (!array_key_exists("Payments", $data)) {
                return self::validateStudent($data);
            } else {
                return self::getTransaction($data);
            }

        } catch (Exception $e) {

            return $this->error('Invalid Content Format');

        }


    }

    public function error($message = "Bad Url") {

        $this->data = new ArrayToXml();
        $this->data->emptyElement('CustomerInformationResponse');
        $this->data->insideEmptyElement('MerchantReference', env("MARCHANTID"));
        $this->data->emptyElement('Customers');
        $this->data->emptyElement('Customer');
        $this->data->insideEmptyElement('Status', self::INVALID);
        $this->data->insideEmptyElement('Amount', 0);
        $this->data->insideEmptyElement('StatusMessage', $message);


        return response($this->data->getContent(), 200)
                        ->header('Content-Type', 'text/xml');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function validateStudent($data)
    {
        $student = Transaction::where('systemNumber', $data['CustReference'])->first();

        if (!$student) {
            return $this->error('Student Not Found');
        }



        $portalFee = 500;
        $sugAlmanac = 400;
        $documentationFee = 1000 * count($student->items);

        $totalCoursesFee =  $portalFee +  $sugAlmanac +  $documentationFee;

        foreach ($student->items as $key => $item) {
            $course = Courses::where('id', $item)->first();
            $totalCoursesFee = $totalCoursesFee + $course->fee;
        }

        $venture = Venture::where('id', $student->venture)->first();
        if ($venture) {
            $totalCoursesFee += $venture->fee;
        }

        // Calculate Total sum
        $interswitchfee = $totalCoursesFee * 0.015;

        $total = $totalCoursesFee + $interswitchfee;

        $ref = $data['CustReference'];

        $this->data = new ArrayToXml();
        $this->data->emptyElement('CustomerInformationResponse');
        $this->data->insideEmptyElement('MerchantReference', env("MARCHANTID"));
        $this->data->emptyElement('Customers');
        $this->data->emptyElement('Customer');
        $this->data->insideEmptyElement('Status', "0");
        $this->data->insideEmptyElement('CustReference', $ref);
        $this->data->insideEmptyElement('CustomerReferenceAlternate', "");
        $this->data->insideEmptyElement('FirstName', Str::upper($student->name));
        $this->data->insideEmptyElement('LastName', "");
        $this->data->insideEmptyElement('Email', "enquiries@normatechsystems.com");
        $this->data->insideEmptyElement('Phone', "09038509510");
        $this->data->insideEmptyElement('ThirdPartyCode', "");
        $this->data->insideEmptyElement('Amount', $total);
        $this->data->emptyElement('PaymentItems');
        $this->data->emptyElement('Item');
        $this->itemContent("PORTAL FEE", "PORTAL_FEE", $portalFee);


        foreach ($student->items as $key => $item) {
            $course = Courses::where('id', $item)->first();
            $this->data->emptyElement('Item', true);
            $this->itemContent($course->title, $course->code, $course->fee);
        }


        $this->data->emptyElement('Item', true);
        $this->itemContent("EDC DOCUMENTATION", "EDC_DOCUMENTATION", $documentationFee, count($student->items));


        $this->data->emptyElement('Item', true);
        $this->itemContent("SUG ALMANAC", "SUG_ALMANAC", $sugAlmanac);


        if ($venture) {
            $this->data->emptyElement('Item', true);
            $this->itemContent(Str::upper($venture->name), $venture->code, $venture->fee);
        }

        //save total Amount

        $student->update([
            'totalAmount' => $total
        ]);


        return response($this->data->getContent(), 200)
                        ->header('Content-Type', 'text/xml');


    }

    public function itemContent($title, $code, $price, $quantity = '1')
    {
        $this->data->insideEmptyElement('ProductName', $title);
        $this->data->insideEmptyElement('ProductCode', $code);
        $this->data->insideEmptyElement('Quantity', $quantity);
        $this->data->insideEmptyElement('Price', $price);
        $this->data->insideEmptyElement('Subtotal', $price);
        $this->data->insideEmptyElement('Tax', "0");
        $this->data->insideEmptyElement('Total', $price);
    }

    public function getTransaction($payment)
    {



        $payment = $payment['Payments']['Payment'];
        $transaction = Transaction::where("systemNumber", $payment['CustReference'])->first();

        if (!$transaction) {
            return $this->transactionResponse($payment['PaymentLogId'], "1", "Incorrect CustReference", 200);
        }

        if ($transaction->totalAmount != $payment['Amount']) {
            return $this->transactionResponse($payment['PaymentLogId'], "1", "Incorrect Amount", 200);
        }

        $dupNotification = PaymentNotification::where("PaymentLogId", $payment['PaymentLogId'])
                                ->where("PaymentReference", $payment['PaymentReference'])
                                ->where("Amount", $payment['Amount'])
                                ->where("ReceiptNo", $payment['ReceiptNo'])
                                ->first();

        if ($dupNotification) {
            return $this->transactionResponse($payment['PaymentLogId'], "1", "Duplicate Payment", 200);
        }

        $IsReversal = $payment['IsReversal'];


        if ($IsReversal == 'True') {

            $dupReversalNotification = PaymentNotification::where("OriginalPaymentLogId", $payment['OriginalPaymentLogId'])
                                    ->where("PaymentReference", $payment['PaymentReference'])
                                    ->where("Amount", $payment['Amount'])
                                    ->where("ReceiptNo", $payment['ReceiptNo'])
                                    ->first();

            if ($dupReversalNotification) {
                return $this->transactionResponse($payment['PaymentLogId'], "1", "Duplicate Reversal Payment", 200);
            }

            try {

                $this->addNotification($transaction, $payment);
                return $this->transactionResponse($payment['PaymentLogId'], "0", "Reversal Payment Successful Received (Already)", 200);

            } catch(Exception $e) {
                return $this->transactionResponse($payment['PaymentLogId'], "1", "Reversal Payment Rejected", 200);
            }

        }


        try {

            $this->addNotification($transaction, $payment);
            return $this->transactionResponse($payment['PaymentLogId'], "0", "Payment Successful Received (Already)", 200);

        } catch(Exception $e) {
            return $this->transactionResponse($payment['PaymentLogId'], "1", "Payment Rejected", 200);
        }


    }

    public function transactionResponse($logId, $error, $errorMessage, $errorCode = 404) {

        $this->data = new ArrayToXml();
        $this->data->emptyElement('PaymentNotificationResponse');
        $this->data->emptyElement('Payments');
        $this->data->emptyElement('Payment');
        $this->data->insideEmptyElement('PaymentLogId', $logId);
        $this->data->insideEmptyElement('Status', $error);
        $this->data->insideEmptyElement('StatusMessage', $errorMessage);


        return response($this->data->getContent(), 200)
                        ->header('Content-Type', 'text/xml');

    }


    public function addNotification($transaction, $payment){
        return $transaction->payment()->create([
            "IsRepeated" => $payment["IsRepeated"],
            "ProductGroupCode" => $payment["ProductGroupCode"],
            "PaymentLogId" => $payment["PaymentLogId"],
            "CustReference" => $payment["CustReference"],
            "AlternateCustReference" => $payment["AlternateCustReference"],
            "Amount" => $payment["Amount"],
            "PaymentStatus" => $payment["PaymentStatus"],
            "PaymentMethod" => $payment["PaymentMethod"],
            "PaymentReference" => $payment["PaymentReference"],
            "TerminalId" => $payment["TerminalId"],
            "ChannelName" => $payment["ChannelName"],
            "Location" => $payment["Location"],
            "IsReversal" => $payment["IsReversal"],
            "PaymentDate" => $payment["PaymentDate"],
            "SettlementDate" => $payment["SettlementDate"],
            "InstitutionId" => $payment["InstitutionId"],
            "InstitutionName" => $payment["InstitutionName"],
            "BranchName" => $payment["BranchName"],
            "BankName" => $payment["BankName"],
            "FeeName" => $payment["FeeName"],
            "CustomerName" => $payment["CustomerName"],
            "OtherCustomerInfo" => $payment["OtherCustomerInfo"],
            "ReceiptNo" => $payment["ReceiptNo"],
            "CollectionsAccount" => $payment["CollectionsAccount"],
            "ThirdPartyCode" => $payment["ThirdPartyCode"],
            "PaymentItems" => $payment["PaymentItems"],
            "BankCode" => $payment["BankCode"],
            "CustomerAddress" => $payment["CustomerAddress"],
            "CustomerPhoneNumber" => $payment["CustomerPhoneNumber"],
            "DepositorName" => $payment["DepositorName"],
            "DepositSlipNumber" => $payment["DepositSlipNumber"],
            "PaymentCurrency" => $payment["PaymentCurrency"],
            "OriginalPaymentLogId" => $payment["OriginalPaymentLogId"],
            "OriginalPaymentReference" => $payment["OriginalPaymentReference"],
            "Teller" => $payment["Teller"],
        ]);
    }

}
