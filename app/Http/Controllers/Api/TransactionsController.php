<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Transaction;
use App\Models\Venture;
use App\Service\ArrayToXml;
use Illuminate\Http\Request;
use Str;

class TransactionsController extends Controller
{

    public $data;

    public const HEADER =  [
        "Content-Type" => 'text/xml'
    ];


    public function index(Request $request)
    {
        if (!$request->getContent()) {
            return $this->error();
        }

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

    }

    public function error() {

        $CustomerInformationResponse = [
            "MerchantReference" => 639,
            'Customers' => [
                'Customer' => [
                    'Status' => 1,
                    'Amount' => 0,
                    ]
                ]
            ];


        return response()->xml($CustomerInformationResponse, '200', self::HEADER, 'CustomerInformationResponse');
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
            return $this->error();
        }

        $venture = Venture::where('id', $student->venture)->first();

        //First Insert Venture
        $items = [];
        $portalFee = 500;
        $sugAlmanac = 400;
        $documentationFee = 1000 * count($student->items);

        $totalCoursesFee =  $portalFee +  $sugAlmanac +  $documentationFee;

        foreach ($student->items as $key => $item) {
            $course = Courses::where('id', $item)->first();
            $totalCoursesFee = $totalCoursesFee + $course->fee;
        }

        if ($venture) {
            $totalCoursesFee += $venture->fee;
        }



        // Calculate Total sum
        $interswitchfee = $totalCoursesFee * 0.015;

        $total = $totalCoursesFee + $interswitchfee;

        $ref = $data['CustReference'];

        $this->data = new ArrayToXml();
        $this->data->emptyElement('CustomerInformationResponse');
        $this->data->insideEmptyElement('MerchantReference', "6405");
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
        $this->data->insideEmptyElement('Amount', ceil($total));
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


        return response($this->data->getContent(), 200)
                        ->header('Content-Type', 'text/xml');





    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTransaction($payment)
    {

            $payment = $payment['Payments']['Payment'];
            $transaction = Transaction::where("systemNumber", $payment['CustReference'])->first();

            if (!$transaction) {
                $PaymentNotificationResponse = [
                    'Payments' => [
                        'Payment' => [
                            "PaymentLogId" => $payment['PaymentLogId'],
                            "Status" => "1"
                        ]
                    ]
                ];
                return response()->xml($PaymentNotificationResponse, '200', self::HEADER, 'PaymentNotificationResponse');
            }

            $transaction->payment()->create([
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


            $PaymentNotificationResponse = [
                'Payments' => [
                    'Payment' => [
                        "PaymentLogId" => $payment['PaymentLogId'],
                        "Status" => "0"
                    ]
                ]
            ];


            return response()->xml($PaymentNotificationResponse, '200', self::HEADER, 'PaymentNotificationResponse');

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
