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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'test',
        //     'username' => 'test',
        //     'email' => 'test@example.com',
        // ]);

        User::insert([
            [
            'name'          => 'Admin Test',
            'username'      => 'Admin',
            'password'      => bcrypt('password'),
            'email'         =>'admin123@example.com',
            'role'          =>'admin',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
            ],

            [
                'name'          => 'User',
                'username'      => 'User',
                'password'      => bcrypt('password'),
                'email'         =>'user123@example.com',
                'role'          =>'buyer',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
                ]
        ]);

        Produk::insert([
            [
            'nama_produk'   => 'Arduino',
            'slug'          => 'Arduino',
            'kategori'      => 'Fisik',
            'harga'         =>'12000',
            'berat'         =>'12',
            'stock'         =>'12',
            'deskripsi'     =>'Arduino Uno',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
            ],
        ]);
    }
}
