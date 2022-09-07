<?php

namespace App;

use App\Traits\UuidModel;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use UuidModel;

    protected $fillable = [
        'step',
        'steps',
        'login_id',
        'monthly_sales',
        'monthly_expenses',
        'other_financing',
        'other_financing_amount',
        'legal_business_name',
        'business_physical_address',
        'business_physical_city',
        'business_physical_province',
        'business_physical_postal',
        'email',
        'dob',
    ];

    protected $casts = [
        'steps' => 'array',
        'other_financing' => 'boolean',
        'dob' => 'date:Y-m-d',
    ];
}
