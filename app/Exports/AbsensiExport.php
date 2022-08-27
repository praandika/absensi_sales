<?php

namespace App\Exports;

use App\Models\Absen;
use App\Models\Sale;
use App\Models\Dealer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Carbon;

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

    public function dealer(string $dealer_code)
    {
        $this->dealer_code = $dealer_code;
        return $this;
    }

    public function view(): View
    {
        
        return view ('export.absensi',[
            'data' => Absen::join('sales','absens.sales_id','=','sales.id')
            ->where('absens.sales_id',$this->sales_id2)
            ->whereBetween('absens.tanggal',[$this->tanggal_awal, $this->tanggal_akhir])
            ->get(),
            'nama' => Sale::where('id',$this->sales_id2)
            ->select('nama_sales')
            ->get(),
            'dealer' => Dealer::where('dealer_code',$this->dealer_code)
            ->select('dealer_name')
            ->get(),
            'today' => Carbon::now('GMT+8'),
            'kerja' =>Absen::join('sales','absens.sales_id','=','sales.id')
            ->where([
                ['absens.sales_id',$this->sales_id2],
                ['absens.keterangan','!=','Libur']
            ])
            ->whereBetween('absens.tanggal',[$this->tanggal_awal, $this->tanggal_akhir])
            ->count(),
            'terlambat' =>Absen::join('sales','absens.sales_id','=','sales.id')
            ->where([
                ['absens.sales_id',$this->sales_id2],
                ['absens.keterangan','=','Terlambat']
            ])
            ->whereBetween('absens.tanggal',[$this->tanggal_awal, $this->tanggal_akhir])
            ->count(),
            'libur' =>Absen::join('sales','absens.sales_id','=','sales.id')
            ->where([
                ['absens.sales_id',$this->sales_id2],
                ['absens.keterangan','=','Libur']
            ])
            ->whereBetween('absens.tanggal',[$this->tanggal_awal, $this->tanggal_akhir])
            ->count()
        ]);
    }
}
