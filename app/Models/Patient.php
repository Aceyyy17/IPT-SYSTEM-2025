<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'address',
        'phone_number',
        'gender',
        'diagnose_id',
        'specialist_id',
    ];

    public function diagnose()
    {
        return $this->belongsTo(Diagnose::class);
    }

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }

    
}
