<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Faculty extends Model
{
    use HasFactory;

    protected $with = 'departments';

    protected $guarded = [];

    public function departments() {
        return $this->hasMany(Department::class);
    }
}
