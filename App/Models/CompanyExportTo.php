<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyExportTo extends Model
{

    public $timestamps = false;

    protected $table = 'company_export_to';

    protected $fillable = [
        'company_id',
        'state',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
