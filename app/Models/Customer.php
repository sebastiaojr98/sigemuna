<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_customer',
        'name',
        'nuit',
        'phone',
        'secondary_phone',
        'email',
        'user_create_id'
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(CustomerDocument::class, "customer_id", "id");
    }

    public function contractedServices(): HasMany
    {
        return $this->hasMany(ServiceContracted::class, "customer_id", "id");
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class, "customer_id", "id");
    }

    public function accountsReceivable(): HasMany
    {
        return $this->hasMany(AccountReceivable::class, "customer_id", "id");
    }

    public function debt(): Attribute
    {
        return Attribute::make(
            get:fn() => $this->accountsReceivable->sum(fn($account) => $account->amount_due - $account->amount_paid)
        );
    }

    public function expiredLicenses(): HasMany
    {
        return $this->hasMany(License::class, "customer_id", "id")->where("status", "Expirada");
    }

}
