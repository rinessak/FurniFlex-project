<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyService extends Model
{
    protected $fillable = [
        'company_id',
        'service',
        'description',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
