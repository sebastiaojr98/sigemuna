<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'nuit',
        'first_name',
        'last_name',
        'birth',
        'gender_id',
        'height',
        'marital_status_id',
        'nationality_id',
        'province_id',
        'district_id',
        'foreign_birthplace',
        'father_name',
        'name_mother',
        'working_status',
        'picture',
        'user_create_id'
    ];

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, "nationality_id", "id");
    }

    public function province()
    {
        return $this->belongsTo(Province::class, "province_id", "id");
    }

    public function district()
    {
        return $this->belongsTo(District::class, "district_id", "id");
    }


    public function gender()
    {
        return $this->belongsTo(Gender::class, "gender_id", "id");
    }

    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class, "marital_status_id", "id");
    }

    public function employeeAddress()
    {
        return $this->hasMany(EmployeeAddress::class, "employee_id", "id");
    }

    public function employeeBankingDomicile()
    {
        return $this->hasOne(BankingDomicile::class, "employee_id", "id");
    }

    public function households()
    {
        return $this->hasMany(Household::class, "employee_id", "id");
    }

    public function spouse()
    {
        return $this->hasOne(Spouse::class, "employee_id", "id");
    }

    public function myDocuments()
    {
        return $this->hasMany(MyDocument::class, "employee_id", "id");
    }

    public function personalContact()
    {
        return $this->hasMany(PersonalContact::class, "employee_id", "id");
    }

    public function alternativeContact()
    {
        return $this->hasMany(AlternativeContact::class, "employee_id", "id");
    }

    public function academicQualification()
    {
        return $this->hasMany(AcademicQualification::class, "employee_id", "id");
    }

    public function professionalExperience()
    {
        return $this->hasMany(ProfessionalExperience::class, "employee_id", "id");
    }

    public function hiring()
    {
        return $this->hasOne(Hiring::class, "employee_id", "id");
    }

    public function provisionalAppointment()
    {
        return $this->hasOne(ProvisionalAppointment::class, "employee_id", "id");
    }

    public function definitiveAppointment()
    {
        return $this->hasOne(DefinitiveAppointment::class, "employee_id", "id");
    }

    public function professionalDevelopment()
    {
        return $this->hasMany(ProfessionalDevelopment::class, "employee_id", "id");
    }

    public function performanceEvaluation()
    {
        return $this->hasMany(PerformanceEvaluation::class, "employee_id", "id");
    }
}