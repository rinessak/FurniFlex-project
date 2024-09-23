<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'content',
        'rating',
        'username',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
