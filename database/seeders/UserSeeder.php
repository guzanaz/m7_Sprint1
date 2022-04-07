<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'program_id' => 1,
            'name' => 'Daniela',
            'lastname' => 'Gallardo',
            'email' => 'daniela@test.com',
            'password' => Hash::make('danielapass'),
            'proxmox_user' => 'root',
            'proxmox_password' => 'Daniel4@Andr3i'
        ]);
        User::factory(50)->create();
    }
}
