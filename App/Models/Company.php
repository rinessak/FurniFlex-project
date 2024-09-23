<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id',
        'contact_email',
        'phone_numbers',
        'description',
        'website',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function locations()
    {
        return $this->hasMany(CompanyLocation::class);
    }

    public function products()
    {
        return $this->hasMany(CompanyProduct::class);
    }

    public function services()
    {
        return $this->hasMany(CompanyService::class);
    }

    public function exports()
    {
        return $this->hasMany(CompanyExportTo::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
