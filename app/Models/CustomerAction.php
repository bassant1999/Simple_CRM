<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'customer_id',
        'type',
        'result',
    ];
}
