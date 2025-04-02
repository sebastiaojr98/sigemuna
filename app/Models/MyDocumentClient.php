<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyDocumentClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_type_id',
        'number',
        'place_of_issue',
        'date_of_issue',
        'document',
        'expiration_date',
        'client_id',
        'user_create_id'
    ];

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, "document_type_id", "id");
    }
}
