<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Student;
use App\Models\Transaction;
use App\Models\Venture;
use Exception;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
                    'Status' => 0,
                    'Amount' => 0,
                    ]
                ]
            ];


        return response()->xml($CustomerInformationResponse, '200', $this->HEADER, 'CustomerInformationResponse');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function validateStudent($data)
    {
        $student = Transaction::where('systemNumber', $data['CustReference'])->firstOrFail();
        $venture = Venture::where('id', $student->venture)->first();

        //First Insert Venture
        $items = [];

        $totalCoursesFee = $venture->fee;

        foreach ($student->items as $key => $item) {
            $course = Courses::where('id', $item)->first();
            $totalCoursesFee = $totalCoursesFee + $course->fee;
            $items['Item'.$key] =  [
                'ProductName' => $course->title,
                'ProductCode' => $course->code,
                'Quantity' => '1',
                'Price' => $course->fee,
                'Subtotal' => $course->fee,
                'Tax' => '0',
                'Total' => $course->fee,
            ];
        }

        $items["Item".++$key] = [
                'ProductName' => $venture->name,
                'ProductCode' => $venture->code,
                'Quantity' => '1',
                'Price' => $venture->fee,
                'Subtotal' => $venture->fee,
                'Tax' => '0',
                'Total' => $venture->fee,
        ];

        // Calculate Total sum
        $interswitchfee = $totalCoursesFee * 0.015;
        $portalfee = 500;
        $total = $totalCoursesFee + $interswitchfee + $portalfee;

        $CustomerInformationResponse = [
            "MerchantReference" => 639,
            'Customers' => [
                'Customer' => [
                    'Status' => 0,
                    'CustReference' => $data['CustReference'],
                    'CustomerReferenceAlternate' => '',
                    'FirstName' => $student->name,
                    'LastName' => '',
                    'Email' => 'olangdan17@gmail.com',
                    'Phone' => '',
                    'ThirdPartyCode' => '',
                    'Amount' => $total,
                    'PaymentItems' => [
                        // 'Item' => [
                        //     'ProductName' => 'PayAtBank',
                        //     'ProductCode' => '01',
                        //     'Quantity' => '1',
                        //     'Price' => '234078',
                        //     'Subtotal' => '234078',
                        //     'Tax' => '0',
                        //     'Total' => '234078',
                        // ],
                    ]
                ]
            ]
        ];

        $CustomerInformationResponse['Customers']['Customer']['PaymentItems'] = [...$items];

        return response()->xml($CustomerInformationResponse, '200', self::HEADER, 'CustomerInformationResponse');
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
            $PaymentNotificationResponse = [
                'Payments' => [
                    'Payment' => [
                        "PaymentLogId" => $payment['PaymentLogId'],
                        "Status" => "0"
                    ]
                ]
            ];


        try {
            $transaction = Transaction::where("systemNumber", $payment['CustReference'])->first();

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

            return response()->xml($PaymentNotificationResponse, '200', self::HEADER, 'PaymentNotificationResponse');

        }catch(Exception $e) {

            $PaymentNotificationResponse['Payments']['Payment']['Status'] = 1;

            return response()->xml($PaymentNotificationResponse, '200', self::HEADER, 'PaymentNotificationResponse');

        }





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
