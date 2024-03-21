<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\SQ_NotApproved_Mod;

class SendEmailMY extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SEND-EMAIL-MY';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SEND SMEC EMAIL';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $smec = DB::connection('SMEC')->select(
            "
            SELECT 
            *
            FROM V_SQ_NOTAPPROVED
            "
        );
        DB::table('v_sq_notapproved')->delete();
        //SMEC
        $isidata = '';
        $isidata = array();
        foreach ($smec as $d) {
            $isidata['sq_no'] = $d->sq_no;
            $isidata['sq_date'] = $d->sq_date;
            $isidata['sq_month'] = $d->sq_month;
            $isidata['sq_cust'] = $d->sq_cust;
            $isidata['cust_city'] = $d->cust_city;
            $isidata['sq_value'] = $d->sq_value;
            $isidata['sq_fnished'] = $d->sq_fnished;
            $isidata['sq_approved'] = $d->sq_approved;
            $isidata['sq_sales'] = $d->sq_sales;
            $isidata['sq_po'] = $d->sq_po;
            $isidata['sales_email'] = $d->sales_email;
            $isidata['sales_cc'] = $d->sales_cc;
            SQ_NotApproved_Mod::create($isidata);
        }
        $this->info('Save to SQL executed successfully!');

        // $data_list_email = DB::connection('SMEC')->select("
        //         SELECT DISTINCT SALES_EMAIL,SALES_CC FROM
        // (SELECT 
        // CASE 
        // WHEN SALES_EMAIL = 'khong@systemmechatronic.my' THEN
        // 'opayabumanyu@gmail.com'
        // WHEN SALES_EMAIL = 'desmondchew@systemmechatronic.my' THEN
        // 'arif@smcindonesia.com'
        // WHEN SALES_EMAIL = 'cdcheng@systemmechatronic.my' THEN
        // 'naufal@smcindonesia.com'
        // WHEN SALES_EMAIL = 'garylee@systemmechatronic.my' THEN
        // 'gamenaufal27@gmail.com'
        // WHEN SALES_EMAIL = 'farisafiq@systemmechatronic.my' THEN
        // 'alviraslstyn@gmail.com'
        // 	ELSE
        // 		'gamenaufal27@gmail.com'
        // END AS SALES_EMAIL,
        // CASE 
        // WHEN SALES_CC = 'desmondchew@systemmechatronic.my; khong@systemmechatronic.my' THEN
        // 'arif@smcindonesia.com; opayabumanyu@gmail.com'
        // WHEN SALES_CC = 'desmondchew@systemmechatronic.my' THEN
        // 'arif@smcindonesia.com'
        // ELSE
        // 'arif@smcindonesia.com; opayabumanyu@gmail.com'
        // END AS SALES_CC
        // FROM V_SQ_NOTAPPROVED)A
        //         ");
        $data_list_email = DB::connection('SMEC')->select("SELECT DISTINCT SALES_EMAIL,SALES_CC FROM V_SQ_NOTAPPROVED WHERE SALES_EMAIL is not null");
        
        foreach ($data_list_email as $list_email) {
            // $data = DB::connection('SMEC')->select("
            //     SELECT * FROM(SELECT 
            // SQ_NO,
            // SQ_DATE,
            // SQ_MONTH,
            // SQ_CUST,
            // CUST_CITY,
            // SQ_VALUE,
            // SQ_FNISHED,
            // SQ_APPROVED,
            // SQ_SALES,
            // CASE 
            // 	WHEN SALES_EMAIL = 'khong@systemmechatronic.my' THEN
            // 		'opayabumanyu@gmail.com'
            // 		WHEN SALES_EMAIL = 'desmondchew@systemmechatronic.my' THEN
            // 		'arif@smcindonesia.com'
            // 		WHEN SALES_EMAIL = 'cdcheng@systemmechatronic.my' THEN
            // 		'naufal@smcindonesia.com'
            // 		WHEN SALES_EMAIL = 'garylee@systemmechatronic.my' THEN
            // 		'gamenaufal27@gmail.com'
            //         WHEN SALES_EMAIL = 'farisafiq@systemmechatronic.my' THEN
            //         'alviraslstyn@gmail.com'
            // 	ELSE
            // 		'gamenaufal27@gmail.com'
            // END AS SALES_EMAIL,
            // CASE 
            // 	WHEN SALES_CC = 'desmondchew@systemmechatronic.my; khong@systemmechatronic.my' THEN
            // 		'arif@smcindonesia.com; opayabumanyu@gmail.com'
            // 	WHEN SALES_CC = 'desmondchew@systemmechatronic.my' THEN
            // 		'arif@smcindonesia.com'
            // 		ELSE
            // 		'arif@smcindonesia.com; opayabumanyu@gmail.com'
            // END AS SALES_CC
            // FROM V_SQ_NOTAPPROVED
            // ORDER BY SQ_SALES,SQ_DATE
            // 		)A WHERE SALES_EMAIL = '" . $list_email->sales_email . "' AND SALES_CC = '" . $list_email->sales_cc . "'
            //     ");
            $data = DB::connection('SMEC')->select("
                SELECT * FROM(SELECT 
            SQ_NO,
            SQ_DATE,
            SQ_MONTH,
            SQ_CUST,
            CUST_CITY,
            SQ_VALUE,
            SQ_FNISHED,
            SQ_APPROVED,
            SQ_SALES,
            SALES_EMAIL,
            SALES_CC
            FROM V_SQ_NOTAPPROVED
            ORDER BY SQ_SALES,SQ_DATE
                    )A WHERE SALES_EMAIL = '" . $list_email->sales_email . "' AND SALES_CC = '" . $list_email->sales_cc . "'
                ");


            //KALO SEND EMAIL TEMPLATE PAKE WEB START
            $part = explode("@", $list_email->sales_email);
            $email = $part[0];
            Mail::send('mail', compact('data','email'), function ($message) use ($list_email) {
                $message->to($list_email->sales_email, 'DATA')->subject('REPORT');
                $parts = explode("; ", $list_email->sales_cc);
                foreach ($parts as $part_email_cc) {
                    if ($part_email_cc != $list_email->sales_email) {
                        $message->to($part_email_cc, 'DATA')->subject('REPORT');
                    }
                }
                $message->to('arif@smcindonesia.com')->subject('REPORT');
                $message->to('naufal@smcindonesia.com')->subject('REPORT');
                $message->from('helpdesk@riyadi.co.id', 'IT');
            });
            //KALO SEND EMAIL TEMPLATE PAKE WEB END            
            $this->info('Email Sent To ' . $list_email->sales_email . ' And To ' . $list_email->sales_cc);
        }
    }
}
