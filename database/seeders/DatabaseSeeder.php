<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoomTypesTableSeeder::class,
            UsersTableSeeder::class,
            RoomsTableSeeder::class,
            BookingsTableSeeder::class,
            PaymentsTableSeeder::class,
            EmployeesTableSeeder::class,
            AdminsTableSeeder::class,
            AmenitiesTableSeeder::class,
            RoomAmenitiesTableSeeder::class,
            ReviewsTableSeeder::class,
        ]);
    }
}
