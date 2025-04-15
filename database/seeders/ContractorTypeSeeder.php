<?php

namespace Database\Seeders;

use App\Models\ContractorType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContractorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['contractor_type_name' => 'Contractor', 'initial' => 'C', 'status' => '1'],
            ['contractor_type_name' => 'Supplier', 'initial' => 'S', 'status' => '1'],
        ];

        foreach ($types as $type) {
            ContractorType::updateOrCreate(
                ['contractor_type_name' => $type['contractor_type_name']],
                [
                    'initial' => $type['initial'],
                    'status' => $type['status']
                ]
            );
        }

    }
}
