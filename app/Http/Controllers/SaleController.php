<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->dealer = 'group') {
            $data = Sale::join('dealers','sales.dealer_id','=','dealers.id')
            ->orderBy('dealers.dealer_code','asc')
            ->select('dealers.dealer_code','dealers.dealer_name','sales.nama_sales','sales.id')
            ->get();
        } else {
            $data = Sale::join('dealers','sales.dealer_id','=','dealers.id')
            ->where('dealers.dealer_code',Auth::user()->dealer)
            ->orderBy('dealers.dealer_code','asc')
            ->select('dealers.dealer_code','dealers.dealer_name','sales.nama_sales','sales.id')
            ->get();
        }

        if (Auth::user()->dealer == 'group') {
            $dealer = Dealer::orderBy('dealer_code','asc')
            ->get();
        } else {
            $dealer = Dealer::orderBy('dealer_code','asc')
            ->where('dealer_code',Auth::user()->dealer)
            ->get();
        }

        return view('data_sales',compact('data','dealer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Sale;
        $data->nama_sales = $request->nama;
        $data->dealer_id = $request->dealer;
        $data->created_at = Carbon::now('GMT+8')->format('Y-m-d H:i:s');
        $data->save();

        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manpower  $manpower
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manpower  $manpower
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Sale::join('dealers','sales.dealer_id','=','dealers.id')
        ->where('sales.id',$id)
        ->select('dealers.dealer_name','sales.nama_sales','sales.id','sales.dealer_id')
        ->get();

        $dealer = Dealer::orderBy('dealer_code','asc')
        ->get();

        return view('edit_sales', compact('data', 'dealer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manpower  $manpower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Sale::where('id',$request->id)
        ->update([
            'nama_sales' => $request->nama,
            'dealer_id' => $request->dealer,
            'updated_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manpower  $manpower
     * @return \Illuminate\Http\Response
     */
}
