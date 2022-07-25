<?php

namespace App\Exports;

use App\Models\Absen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class AbsensiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function tanggal_awal(string $tanggal_awal)
    {
        $this->tanggal_awal = $tanggal_awal;
        return $this;
    }

    public function end(string $tanggal_akhir)
    {
        $this->tanggal_akhir = $tanggal_akhir;
        return $this;
    }

    public function view()
    {
        
        return view ('export.absensi',['absen' => Absen::join('sales','absens.sales_id','=','sales.id')
        ->whereBetween('tanggal',[$this->tanggal_awal, $this->tanggal_akhir])
        ->where('sales_id',$sales_id2)
        ->get()
    ]);
    }
}
