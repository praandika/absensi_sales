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
                'sales_id' => '1',
                'password' => Hash::make('pasek123456'),
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
