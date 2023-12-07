<?php

namespace App\Http\Controllers;

use App\Models\BlastModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class BlastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blast');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send()
    {
        $data_email = BlastModel::where('flag','!=','1')->take(2)->get();
        foreach($data_email as $data){
            Mail::send(
                "blast",
                compact("data_email"),
                function ($message) use($data){
                    $message
                        ->to($data->email, "CUSTOMER")
                        ->subject("THANK YOU FROM US");
                    $message->from("helpdesk@riyadi.co.id", "SYSTEM NO REPLY");
                }
            );
            $isidata['flag'] = 1;
            BlastModel::where('email', $data->email)->update($isidata);
        }
        echo "EMAIL SUKSES";
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
     * @param  \App\Models\BlastModel  $blastModel
     * @return \Illuminate\Http\Response
     */
    public function show(BlastModel $blastModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlastModel  $blastModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BlastModel $blastModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlastModel  $blastModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlastModel $blastModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlastModel  $blastModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlastModel $blastModel)
    {
        //
    }
}
