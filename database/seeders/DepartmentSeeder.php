<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Library', 'slug' => 'library'],
            ['name' => 'Finance', 'slug' => 'finance'],
            ['name' => 'Registrar', 'slug' => 'registrar'],
            ['name' => 'Student Affairs', 'slug' => 'student-affairs'],
            ['name' => 'Dean\'s Office', 'slug' => 'deans-office'],
        ];

        foreach ($departments as $dept) {
            \App\Models\Department::create($dept);
        }

    }
}
