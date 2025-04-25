<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deparments = [
            ['department_name' => 'Junior Engineer','status'=>1, 'initial'=>'JE'],
            ['department_name' => 'Engineer','status'=>1, 'initial'=>'E'],
            ['department_name' => 'Deputy Engineer','status'=>1, 'initial'=>'DE'],
            ['department_name' => 'Executive Engineer','status'=>1, 'initial'=>'EE'],
            ['department_name' => 'City Engineer','status'=>1, 'initial'=>'CE'],
            ['department_name' => 'Assistant Commissioner','status'=>1, 'initial'=>'AC'],
            ['department_name' => 'Chief Accounts and Finance Officer','status'=>1, 'initial'=>'CAFO'],
            ['department_name' => 'Auditor','status'=>1, 'initial'=>'A'],
            ['department_name' => 'Chief Auditor','status'=>1, 'initial'=>'CA'],
            ['department_name' => 'Deputy Municipal Commissioner','status'=>1, 'initial'=>'DMC'],
            ['department_name' => 'Additional Municipal Commissioner','status'=>1, 'initial'=>'ADMC'],
            ['department_name' => 'Commissioner','status'=>1, 'initial'=>'C'],
            ['department_name' => 'Secretory','status'=>1, 'initial'=>'S'],
            ['department_name' => 'Information Technology','status'=>1, 'initial'=>'IT'],
            ['department_name' => 'Public Relations Office','status'=>1, 'initial'=>'PRO'],
            ['department_name' => 'Clerk','status'=>1, 'initial'=>'Cl'],
        ];

        // Insert roles into the database
        foreach ($deparments as $deparment) {
            Department::create($deparment);
        }
    }
}
