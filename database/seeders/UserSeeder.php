<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 500 users with the role "customer"
        User::factory()->count(100)->create([
            'role' => 'customer',
        ]);
    }
}
