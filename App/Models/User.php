<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',  // 'company', 'admin'
    ];

    // Relationships

    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
