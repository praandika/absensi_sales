<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class absens_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Absen::insert([
            [
                'sales_id' => '1',
                'keterangan' => 'telat',
                'tanggal' => Carbon::now('GMT+8')->format('Y-m-d'),
                'waktu' => Carbon::now('GMT+8')->format('H:i:s'),
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
