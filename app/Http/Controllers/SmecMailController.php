<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\SQ_NotApproved_Mod;
use Illuminate\Support\Facades\Hash;

class SmecMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tampilan($sales)
    {
        // $data = DB::connection('SMEC')->select(
        //     "
        // SELECT 
        //     SQ_NO,
        //     SQ_DATE,
        //     SQ_MONTH,
        //     SQ_CUST,
        //     CUST_CITY,
        //     SQ_VALUE,
        //     SQ_FNISHED,
        //     SQ_APPROVED,
        //     SQ_SALES,
        //     SALES_EMAIL,
        //     SALES_CC
        // FROM V_SQ_NOTAPPROVED 
        // /*WHERE SQ_SALES = 'FARIS AFIQ'
        // AND ROWNUM < 5*/
        // "
        // );
        $data = SQ_NotApproved_Mod::where('sales_email','like',$sales.'%')->orderByRaw('sq_date asc')->get();
        $part = explode("@", $sales);
        $email = $part[0];
        return view('mail', compact('data','email'));
    }
}
