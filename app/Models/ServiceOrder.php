<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'amount',
        'status',
        'client_id',
        'user_id',
        'service_id',
        'neighborhood_id',
        'sub_service_id',
        'payday',
        'observation'
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function subService(){
        return $this->belongsTo(SubService::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
