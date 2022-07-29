<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Dealer::orderBy('dealer_code','asc')
        ->get();

        return view('data_dealer',compact('data'));
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
        $data = new Dealer;
        $data->dealer_name = $request->dealer_name;
        $data->dealer_code = $request->dealer_code;
        $data->created_at = Carbon::now('GMT+8')->format('Y-m-d H:i:s');
        $data->save();

        return redirect()->route('dealer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function show(Dealer $dealer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dealer::where('id',$id)
        ->get();

        return view('edit_dealer', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Dealer::where('id',$request->id)
        ->update([
            'dealer_name' => $request->dealer_name,
            'dealer_code' => $request->dealer_code,
            'updated_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dealer $dealer)
    {
        //
    }
}
