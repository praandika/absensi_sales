<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use App\Exports\AbsensiExport;
use Maatwebsite\Excel\Facades\Excel;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = Absen::join('sales','absens.sales_id','=','sales.id')
        ->get();
        $sale = Sale::all();
        return view('data',compact('data','sale'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $sekarang = Carbon::now('GMT+8')->format('H:i:s');
        $telat = '08:30:00';

        $data = new Absen;

        if($sekarang > $telat)
        {
        $data -> sales_id = $req->sales_id;
        $data -> tanggal = Carbon::now('GMT+8')->format('Y-m-d');
        $data -> waktu = Carbon::now('GMT+8')->format('H:i:s');
        $data -> keterangan = 'Terlambat';
        }else{
        $data -> sales_id = $req->sales_id;
        $data -> tanggal = Carbon::now('GMT+8')->format('Y-m-d');
        $data -> waktu = Carbon::now('GMT+8')->format('H:i:s');
        $data -> keterangan = 'Tepat Waktu';
        }
        $data->save();
        
        
        return redirect()->back();
    }

    public function off(Request $req)
    {
        
        $data = new Absen;
        $data -> sales_id = $req->sales_id3;
        $data -> tanggal = $req->tanggal;
        $data -> waktu = Carbon::now('GMT+8')->format('H:i:s');
        $data -> keterangan = 'Libur';
        $data->save();
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        $tanggal_awal = $req->tanggal_awal;
        $tanggal_akhir = $req->tanggal_akhir;
        $sales_id2 = $req->sales_id2;

        $sale = Sale::all();
        $data = Absen::join('sales','absens.sales_id','=','sales.id')
        ->whereBetween('tanggal',[$tanggal_awal, $tanggal_akhir])
        ->where('sales_id',$sales_id2)
        ->get();

        return view('data',compact('data','sale'));
    }

    public function export_excel($tanggal_akhir, $tanggal_awal)
	{
		return (new AbsensiExport)->tanggal_awal($tanggal_awal)->tanggal_akhir($tanggal_akhir)->download('absensi'.$tanggal_awal.'-'.$tanggal_akhir.'absen.xlsx');
	}
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        //
    }
}
