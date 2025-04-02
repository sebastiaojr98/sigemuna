<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'amount',
        'status',
        'client_id',
        'user_id',
        'issue_date',
        'due_date',
        'license_status_id',
        'license_type_id',
        'license_id',
        'observation',
        "payday",
        "township",
        "car_brand",
        "car_registration",
        "car_model",
        "communal_unit_id",
        "house_number",
        "block"
    ];


    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function license(){
        return $this->belongsTo(License::class);
    }

    public function license_type(){
        return $this->belongsTo(LicenseType::class, 'license_type_id', 'id');
    }

    public function communal_unit(){
        return $this->belongsTo(CommunalUnity::class, 'communal_unit_id', 'id');
    }

    public function licenseStatus(){
        return $this->belongsTo(LicenseStatus::class, 'license_status_id', 'id');
    }
}
