<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(MaritalStatusSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(NationalitySeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(AdministrativePostSeeder::class);
        $this->call(NeighborhoodSeeder::class);
        $this->call(CommunalUnitySeeder::class);
        $this->call(BankCardIssuerSeeder::class);
        $this->call(DegreeOfKinshipSeeder::class);
        $this->call(DocumentTypeSeeder::class);
        $this->call(TypeContactSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(PositionCompanySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(FinancierTypeSeeder::class);
        $this->call(TypeInvestorSeeder::class);
        $this->call(InfrastructureTypeSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ModelHasRoleSeeder::class);
        $this->call(RoleHasPermissionSeeder::class);
        $this->call(ServiceCategorySeeder::class);
        $this->call(ServiceSeeder::class);
    }
}
