<?php

namespace Database\Seeders;

use App\Models\Courier;
use App\Models\Organization;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Courier::factory(10)->create();
        Organization::factory(10)->create();
    }
}
