<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $fillable =[
        "name",
        "license_type_id",
        "amount"
    ];

    public function licenseType(){
        return $this->belongsTo(LicenseType::class, 'license_type_id', 'id');
    }
}
