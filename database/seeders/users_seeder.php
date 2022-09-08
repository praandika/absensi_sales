<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class users_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
            [
                'nama' => 'pasek',
                'username' => 'pasek85',
                'dealer' => 'group',
                'password' => Hash::make('pasek123456'),
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'I Wayan Andika Pranayoga',
                'username' => 'andika',
                'dealer' => 'group',
                'password' => Hash::make('andika18'),
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Admin Dalung',
                'username' => 'dalung',
                'dealer' => 'AA0104-01',
                'password' => Hash::make('dalungaa010401'),
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Admin',
                'username' => 'admin',
                'dealer' => 'group',
                'password' => Hash::make('admin'),
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
