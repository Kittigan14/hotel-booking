<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        Employee::create([
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'phone_number' => '123456789',
            'position' => 'Manager',
        ]);

        Employee::create([
            'name' => 'Bob Williams',
            'email' => 'bob@example.com',
            'phone_number' => '987654321',
            'position' => 'Receptionist',
        ]);
    }
}
