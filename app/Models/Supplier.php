<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'secondary_phone',
        'address',
        'nuit',
        'notes',
        'user_create_id',
        'status',
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(SupplierDocument::class, "supplier_id", "id");
    }

    public function accountsPayable(): HasMany
    {
        return $this->hasMany(AccountPayable::class, 'supplier_id', 'id');
    }
}
