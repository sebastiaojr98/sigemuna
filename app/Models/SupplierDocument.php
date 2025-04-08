<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupplierDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_type_id',
        'file_path',
        'expires_at',
        'notes',
        'supplier_id',
        'user_create_id'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class, "document_type_id", "id");
    }
}
