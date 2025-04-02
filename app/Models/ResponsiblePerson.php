<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsiblePerson extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_type_id',
        'document_number',
        'phone',
        'full_name',
        'document',
        'client_id',
        'user_create_id'
    ];


    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, "document_type_id", "id");
    }
}
