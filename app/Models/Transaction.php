<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'items' => 'array',
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function payment() {
        return $this->hasOne(PaymentNotification::class);
    }

}
