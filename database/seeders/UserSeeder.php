<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // membuat data palsu menggunakan Seeder
        // DB::table('users')->insert(
        // [
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'email_verified_at' => date('Y:m:d H:i:s',time()),
        //     'password' => Hash::make('password'),
        //     'is_admin' => false
            
        // ]);

        // membuat data palsu menggunakan factoru
        User::factory(30)->create();

    }
}
