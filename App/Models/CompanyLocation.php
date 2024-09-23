<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyLocation extends Model
{
    protected $fillable = [
        'company_id',
        'address',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
