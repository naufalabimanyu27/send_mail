<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportData;
use Illuminate\Support\Collection;
// use Maatwebsite\Excel;

class SmecMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tampilan()
    {
        $data = DB::connection('SMEC')->select(
            "
        SELECT 
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
        FROM V_SQ_NOTAPPROVED WHERE SQ_SALES = 'FARIS AFIQ' AND SQ_MONTH='OCT'
        AND ROWNUM < 5
        "
        );
        return view('mail', compact('data'));
    }

    public function kirim()
    {
        $data_list_email = DB::connection('SMEC')->select("
                SELECT DISTINCT SALES_EMAIL,SALES_CC FROM
        (SELECT 
        CASE 
        WHEN SALES_EMAIL = 'khong@systemmechatronic.my' THEN
        'opayabumanyu@gmail.com'
        WHEN SALES_EMAIL = 'desmondchew@systemmechatronic.my' THEN
        'arif@smcindonesia.com'
        WHEN SALES_EMAIL = 'cdcheng@systemmechatronic.my' THEN
        'naufal@smcindonesia.com'
        WHEN SALES_EMAIL = 'garylee@systemmechatronic.my' THEN
        'gamenaufal27@gmail.com'
        WHEN SALES_EMAIL = 'farisafiq@systemmechatronic.my' THEN
        'alviraslstyn@gmail.com'
        	ELSE
        		'gamenaufal27@gmail.com'
        END AS SALES_EMAIL,
        CASE 
        WHEN SALES_CC = 'desmondchew@systemmechatronic.my; khong@systemmechatronic.my' THEN
        'arif@smcindonesia.com; opayabumanyu@gmail.com'
        WHEN SALES_CC = 'desmondchew@systemmechatronic.my' THEN
        'arif@smcindonesia.com'
        ELSE
        'arif@smcindonesia.com; opayabumanyu@gmail.com'
        END AS SALES_CC
        FROM V_SQ_NOTAPPROVED)A
                ");
        // $data_list_email = DB::connection('SMEC')->select("SELECT DISTINCT SALES_EMAIL,SALES_CC FROM V_SQ_NOTAPPROVED WHERE SALES_EMAIL is not null");
        foreach ($data_list_email as $list_email) {
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
            CASE 
            	WHEN SALES_EMAIL = 'khong@systemmechatronic.my' THEN
            		'opayabumanyu@gmail.com'
            		WHEN SALES_EMAIL = 'desmondchew@systemmechatronic.my' THEN
            		'arif@smcindonesia.com'
            		WHEN SALES_EMAIL = 'cdcheng@systemmechatronic.my' THEN
            		'naufal@smcindonesia.com'
            		WHEN SALES_EMAIL = 'garylee@systemmechatronic.my' THEN
            		'gamenaufal27@gmail.com'
                    WHEN SALES_EMAIL = 'farisafiq@systemmechatronic.my' THEN
                    'alviraslstyn@gmail.com'
            	ELSE
            		'gamenaufal27@gmail.com'
            END AS SALES_EMAIL,
            CASE 
            	WHEN SALES_CC = 'desmondchew@systemmechatronic.my; khong@systemmechatronic.my' THEN
            		'arif@smcindonesia.com; opayabumanyu@gmail.com'
            	WHEN SALES_CC = 'desmondchew@systemmechatronic.my' THEN
            		'arif@smcindonesia.com'
            		ELSE
            		'arif@smcindonesia.com; opayabumanyu@gmail.com'
            END AS SALES_CC
            FROM V_SQ_NOTAPPROVED
            ORDER BY SQ_SALES,SQ_DATE
            		)A WHERE SALES_EMAIL = '" . $list_email->sales_email . "' AND SALES_CC = '" . $list_email->sales_cc . "'
                ");
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
            // SALES_EMAIL,
            // SALES_CC
            // FROM V_SQ_NOTAPPROVED
            // ORDER BY SQ_SALES,SQ_DATE
            //         )A WHERE SALES_EMAIL = '" . $list_email->sales_email . "' AND SALES_CC = '" . $list_email->sales_cc . "'
            //     ");


            //KALO SEND EMAIL TEMPLATE PAKE WEB START
            // Mail::send('mail', compact('data'), function ($message) use ($list_email) {
            //     $message->to($list_email->sales_email, 'DATA')->subject('REPORT');
            //     $parts = explode("; ", $list_email->sales_cc);
            //     foreach ($parts as $part_email_cc) {
            //         if ($part_email_cc != $list_email->sales_email) {
            //             $message->to($part_email_cc, 'DATA')->subject('REPORT');
            //         }
            //     }
            //     $message->from('helpdesk@riyadi.co.id', 'IT');
            // });
            //KALO SEND EMAIL TEMPLATE PAKE WEB END

            //KALO SEND EMAIL TEMPLATE PAKE EXCEL START
            // Convert the array to a collection
            $dataCollection = new Collection($data);
            // Create a new ExportData instance
            $exportData = new ExportData($dataCollection);
            $tempFile = tempnam(sys_get_temp_dir(), 'excel');
            Excel::store($exportData, $tempFile, 'local', 'XLSX');
            $excelFile = file_get_contents($tempFile);
            Mail::to($list_email->sales_email, 'DATA')
                ->subject('REPORT')
                ->attachData($excelFile, 'exported_data_' . date("Y-m-d") . '.xlsx');

            // Clean up the temporary file
            unlink($tempFile);
            //KALO SEND EMAIL TEMPLATE PAKE EXCEL END
            echo "Basic Email Sent To " . $list_email->sales_email . "<br>And To " . $list_email->sales_cc . "<hr>";
        }
        // foreach ($data as $d) {
        //     $parts = explode("; ", $d->sales_cc);
        //     foreach ($parts as $part) {
        //         echo $part . "<br>";
        //     }
        //     echo "<hr>";
        // }
    }
}
