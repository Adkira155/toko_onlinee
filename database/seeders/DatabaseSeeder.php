<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Produk;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      User::factory(10)->create();

        User::factory()->create([
            'name'          => 'Admin Test',
            'username'      => 'Admin',
            'password'      => bcrypt('password'),
            'email'         =>'admin123@example.com',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);


    }
}
