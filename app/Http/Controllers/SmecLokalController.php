<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Vnet_Mod;

class SmecLokalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //BRAND
        $query='type';
        $loopperiode = array();
        for ($i=12; $i >= 1 ; $i--) { 
            $periode = date("Ym", strtotime("-".$i." months"));
            $periodetext = date("M-Y", strtotime("-".$i." months"));
            $query .= ", SUM(CASE WHEN DATE_FORMAT(dsi_date,'%Y%m') = '".$periode."' THEN net_dpp ELSE 0 END) m".$i;
            $loopperiode[] = $periodetext;
        }
        $data_brand = Vnet_Mod::select(DB::raw($query))
                ->groupBy('type')
                ->get();

        //SALES
        $query='sales';
        $loopperiode = array();
        for ($i=12; $i >= 1 ; $i--) { 
            $periode = date("Ym", strtotime("-".$i." months"));
            $periodetext = date("M-Y", strtotime("-".$i." months"));
            $query .= ", SUM(CASE WHEN DATE_FORMAT(dsi_date,'%Y%m') = '".$periode."' THEN net_dpp ELSE 0 END) m".$i;
            $loopperiode[] = $periodetext;
        }
        $data_sales = Vnet_Mod::select(DB::raw($query))
                ->groupBy('sales')
                ->get();

        //CUSTOMER
        $query='customer';
        $loopperiode = array();
        for ($i=12; $i >= 1 ; $i--) { 
            $periode = date("Ym", strtotime("-".$i." months"));
            $periodetext = date("M-Y", strtotime("-".$i." months"));
            $query .= ", SUM(CASE WHEN DATE_FORMAT(dsi_date,'%Y%m') = '".$periode."' THEN net_dpp ELSE 0 END) m".$i;
            $loopperiode[] = $periodetext;
        }
        $data_customer = Vnet_Mod::select(DB::raw($query))
                ->groupBy('customer')
                ->get();

        return view('smec',compact('data_customer','data_sales','data_brand','loopperiode'));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
