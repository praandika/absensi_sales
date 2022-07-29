<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DealerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Dealer::insert([
            [
                'dealer_name' => 'Bisma Sentral',
                'dealer_code' => 'AA0101',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
            [
                'dealer_name' => 'Bisma Cokro',
                'dealer_code' => 'AA0102',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
            [
                'dealer_name' => 'Bisma Hasanudin',
                'dealer_code' => 'AA0104',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
            [
                'dealer_name' => 'Bisma TTS',
                'dealer_code' => 'AA0105',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
            [
                'dealer_name' => 'Bisma Imbo',
                'dealer_code' => 'AA0106',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
            [
                'dealer_name' => 'Bisma Mandiri',
                'dealer_code' => 'AA0107',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
            [
                'dealer_name' => 'Bisma Supratman',
                'dealer_code' => 'AA0108',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
            [
                'dealer_name' => 'Bisma SR',
                'dealer_code' => 'AA0109',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
            [
                'dealer_name' => 'FSS',
                'dealer_code' => 'AA0104F',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
