<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Sale;
use App\Models\Dealer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Exports\AbsensiExport;
use PDF;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::now('GMT+8')->format('Y-m-d');
        if (Auth::user()->dealer == 'group') {
            $data = Absen::join('sales','absens.sales_id','=','sales.id')
            ->where('absens.tanggal',$today)
            ->get();
            $sale = Sale::join('dealers','sales.dealer_id','=','dealers.id')
            ->orderBy('dealers.dealer_code','asc')
            ->select('dealers.dealer_name','sales.id','sales.nama_sales','dealers.dealer_code')
            ->get();
        } else {
            $data = Absen::join('sales','absens.sales_id','=','sales.id')
            ->join('dealers','sales.dealer_id','=','dealers.id')
            ->where('dealers.dealer_code', Auth::user()->dealer)
            ->where('absens.tanggal',$today)
            ->get();
            $sale = Sale::join('dealers','sales.dealer_id','=','dealers.id')
            ->where('dealers.dealer_code', Auth::user()->dealer)
            ->orderBy('dealers.dealer_code','asc')
            ->select('dealers.dealer_name','sales.id','sales.nama_sales','dealers.dealer_code')
            ->get();
        }
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
        $telat = '08:11:00';

        $data = new Absen;

        if($sekarang > $telat)
        {
        $data->sales_id = $req->sales_id;
        $data->tanggal = Carbon::now('GMT+8')->format('Y-m-d');
        $data->waktu = Carbon::now('GMT+8')->format('H:i:s');
        $data->keterangan = 'Terlambat';
        }else{
        $data->sales_id = $req->sales_id;
        $data->tanggal = Carbon::now('GMT+8')->format('Y-m-d');
        $data->waktu = Carbon::now('GMT+8')->format('H:i:s');
        $data->keterangan = 'Tepat Waktu';
        }
        $data->save();
        
        
        return redirect()->route('absen');
    }

    public function off(Request $req)
    {
        
        $data = new Absen;
        $data -> sales_id = $req->sales_id3;
        $data -> tanggal = $req->tanggal;
        $data -> waktu = Carbon::now('GMT+8')->format('H:i:s');
        $data -> keterangan = 'Libur';
        $data->save();
        
        return redirect()->route('absen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        
    }

    public function search(Request $req){
        $tanggal_awal = $req->tanggal_awal;
        $tanggal_akhir = $req->tanggal_akhir;
        $sales_id2 = $req->sales_id2;
        $dealer_code = $req->dealer_code;

        $sale = Sale::join('dealers','sales.dealer_id','=','dealers.id')
        ->orderBy('dealers.dealer_code','asc')
        ->select('dealers.dealer_name','sales.id','sales.nama_sales','dealers.dealer_code')
        ->get();
        $data = Absen::join('sales','absens.sales_id','=','sales.id')
        ->whereBetween('tanggal',[$tanggal_awal, $tanggal_akhir])
        ->where('sales_id',$sales_id2)
        ->get();

        return view('data_search', compact('data','tanggal_awal','tanggal_akhir','sales_id2','sale','dealer_code'));
    }

    public function export_excel($tanggal_awal, $tanggal_akhir, $sales_id2, $dealer_code)
	{
		return (new AbsensiExport)->tanggal_awal($tanggal_awal)->tanggal_akhir($tanggal_akhir)->sales($sales_id2)->dealer($dealer_code)->download('absensi_'.$tanggal_awal.'_sd_'.$tanggal_akhir.'-'.$sales_id2.'-'.$dealer_code.'.xlsx');
	}

    public function generate_pdf($tanggal_awal, $tanggal_akhir, $sales_id2, $dealer_code){
        $ta = Carbon::parse($tanggal_awal)->translatedFormat('Ymd');
        $tak = Carbon::parse($tanggal_akhir)->translatedFormat('Ymd');
        // dd($ta, $tak);

        $data  =[
            'absen' => Absen::join('sales','absens.sales_id','=','sales.id')
            ->where('absens.sales_id',$sales_id2)
            ->whereBetween('absens.tanggal',[$tanggal_awal, $tanggal_akhir])
            ->get(),
            'nama' => Sale::where('id',$sales_id2)
            ->select('nama_sales')
            ->get(),
            'dealer' => Dealer::where('dealer_code',$dealer_code)
            ->select('dealer_name')
            ->get(),
            'today' => Carbon::now('GMT+8'),
            'kerja' =>Absen::join('sales','absens.sales_id','=','sales.id')
            ->where([
                ['absens.sales_id',$sales_id2],
                ['absens.keterangan','=','Tepat Waktu']
            ])
            ->whereBetween('absens.tanggal',[$tanggal_awal, $tanggal_akhir])
            ->count(),
            'terlambat' =>Absen::join('sales','absens.sales_id','=','sales.id')
            ->where([
                ['absens.sales_id',$sales_id2],
                ['absens.keterangan','=','Terlambat']
            ])
            ->whereBetween('absens.tanggal',[$tanggal_awal, $tanggal_akhir])
            ->count(),
            'libur' =>Absen::join('sales','absens.sales_id','=','sales.id')
            ->where([
                ['absens.sales_id',$sales_id2],
                ['absens.keterangan','=','Libur']
            ])
            ->whereBetween('absens.tanggal',[$tanggal_awal, $tanggal_akhir])
            ->count(),
            'code' => 'Si'.$dealer_code.$ta.'BISMA'.$tak.'-'.$sales_id2,
            ];

        $pdf = PDF::loadView('pdf.absensi', $data);

        return $pdf->download('absensi_'.$tanggal_awal.'_sd_'.$tanggal_akhir.'-'.$sales_id2.'-'.$dealer_code.'.pdf');
    }

    public function original(){
        return view('original');
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
