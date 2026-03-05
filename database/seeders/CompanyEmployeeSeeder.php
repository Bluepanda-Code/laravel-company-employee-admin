<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class CompanyEmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::factory()->count(5)->create();

        foreach ($companies as $company) {
            Employee::factory()->count(rand(3, 8))->create([
                'company_id' => $company->id,
                'status' => rand(0,1) ? 'active' : 'inactive'
            ]);
        }
    }
}