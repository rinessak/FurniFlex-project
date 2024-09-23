<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProduct extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'company_id',
        'product',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
