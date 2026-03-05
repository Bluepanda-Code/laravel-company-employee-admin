<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
    'first_name', 'last_name', 'company_id', 'email', 'phone', 'status'
];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Accessor for full name (useful in views)
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}