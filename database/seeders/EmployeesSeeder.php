<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Facades\File;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $json = File::get(base_path(env('JSON_EMPL', 'database/data/employees.json')));
    $employees = json_decode($json);
    foreach ($employees as $employee) {
        Employee::create([
            'name' => $employee->name,
            'surname' => $employee->surname,
            'email' => $employee->email,
            'phone' => $employee->phone,
            'role' => $employee->role,
            'salary' => $employee->salary,
            'date_of_employment' => $employee->date_of_employment,
            'image' => $employee->image,
            'notes' => $employee->notes,
        ]);
    }
}
}

