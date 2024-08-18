<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234'),
        ]);

        Company::create([
            'name' => 'ABC Corp.',
            'email' => 'abc@gmail.com',
            'address' => 'Jakarta, Indonesia',
            'latitude' => '-7.747033',
            'longitude' => '112.922268',
            'radius_km'  => '0.5',
            'time_in' => '08:00',
            'time_out' => '17:00',
        ]);

        $this->call([AttendanceSeeder::class,PermissionSeeder::class]);

    }
}
