<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Hukum',
                'short_name' => 'FH',
                'description' => 'Jurusan Hukum',
            ],
        ];

        Department::insert($departments);
    }
}
