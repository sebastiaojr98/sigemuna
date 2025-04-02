<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'nuit',
        'full_name',
        'birth',
        'account_type_id',
        'gender_id',
        'marital_status_id',
        'nationality_id',
        'province_id',
        'phone',
        'district_id',
        'foreign_birthplace',
        'user_create_id'
    ];

    public function accountType()
    {
        return $this->belongsTo(AccountType::class, "account_type_id", "id");
    }

    public function clientAddress()
    {
        return $this->hasMany(ClientAddress::class, "client_id", "id");
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, "gender_id", "id");
    }

    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class, "marital_status_id", "id");
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, "nationality_id", "id");
    }

    public function licenses(){
        return $this->hasMany(LicenseOrder::class);
    }
    
    public function services(){
        return $this->hasMany(ServiceOrder::class);
    }
    
    public function responsiblePerson()
    {
        return $this->hasMany(ResponsiblePerson::class, "client_id", "id");
    }

    public function myDocuments()
    {
        return $this->hasMany(MyDocumentClient::class, "client_id", "id");
    }
}
