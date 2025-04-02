<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financier extends Model
{
    use HasFactory;

    protected $fillable = [
        'financier_type_id',
        'name',
        'description',
        'address',
        'city',
        'state',
        'country',
        'phone',
        'email',
        'site',
        'user_id',
    ];
    

    public function typeFunder()
    {
        return $this->belongsTo(FinancierType::class, "financier_type_id", "id");
    }
}
