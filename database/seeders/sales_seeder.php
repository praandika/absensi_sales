<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class sales_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Sale::insert([
            [
                'nama_sales' => 'I Gede Pasek Beratha Astana',
                'dealer_id' => '1',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
            [
                'nama_sales' => 'I Wayan Andika Pranayoga',
                'dealer_id' => '2',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
