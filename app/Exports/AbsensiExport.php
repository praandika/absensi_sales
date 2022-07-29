<?php

namespace App\Exports;

use App\Models\Absen;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class AbsensiExport implements FromView
{
    use Exportable;

    public function tanggal_awal(string $tanggal_awal)
    {
        $this->tanggal_awal = $tanggal_awal;
        return $this;
    }

    public function tanggal_akhir(string $tanggal_akhir)
    {
        $this->tanggal_akhir = $tanggal_akhir;
        return $this;
    }

    public function sales(string $sales_id2)
    {
        $this->sales_id2 = $sales_id2;
        return $this;
    }

    public function view(): View
    {
        
        return view ('export.absensi',[
            'data' => Absen::join('sales','absens.sales_id','=','sales.id')
            ->where('absens.sales_id',$this->sales_id2)
            ->whereBetween('absens.tanggal',[$this->tanggal_awal, $this->tanggal_akhir])
            ->get()
        ]);
    }
}
