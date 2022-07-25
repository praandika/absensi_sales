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
                'nama_sales' => 'i gede pasek beratha astana',
                'dealer_id' => '1',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
