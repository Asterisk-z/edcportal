<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentNotification extends Model
{
    use HasFactory;

    protected $guarded =  [];

    protected $casts = [
        'PaymentItems' => 'array',
        'TerminalId' => 'array',
        'FeeName' => 'array',
        'CustomerName' => 'array',
        'ThirdPartyCode' => 'array',
        'CustomerAddress' => 'array',
        'CustomerPhoneNumber' => 'array',
        'DepositorName' => 'array',
        'OriginalPaymentLogId' => 'array',
        'OriginalPaymentReference' => 'array',
    ];

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }
}
