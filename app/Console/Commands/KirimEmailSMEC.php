<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Vnet_Mod;

class KirimEmailSMEC extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:KirimEmailSMEC';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kirim Email Tapi Yang SMEC';

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
            "SELECT TYPE, DSI_CUST_ID, MSI_CUST_NAME, SALES_NAME, NET_DPP, DSI_DATE, TO_CHAR(DSI_DATE, 'YY-MON') AS PERIOD, TO_CHAR(DSI_DATE, 'YYYY') AS YEAR, TO_CHAR(DSI_DATE, 'MM') AS MONTH FROM V_NET WHERE ( DSI_DATE >= TO_DATE( TO_CHAR( ADD_MONTHS(SYSDATE, -12), 'YYYYMM' ) || '01', 'YYYYMMDD' ) AND DSI_DATE <= LAST_DAY( TO_DATE( TO_CHAR( ADD_MONTHS(SYSDATE, -1), 'MM' ), 'MM' ) ) ) ORDER BY YEAR,MONTH ASC"
        );
        DB::table('v_net')->delete();
        $isidata = '';
        $isidata = array();
        foreach ($smec as $d) {
            $isidata['type'] = $d->type;
            $isidata['period'] = $d->period;
            $isidata['year'] = $d->year;
            $isidata['month'] = $d->month;
            $isidata['net_dpp'] = $d->net_dpp;
            $isidata['dsi_cust_id'] = $d->dsi_cust_id;
            $isidata['dsi_date'] = $d->dsi_date;
            $isidata['customer'] = $d->msi_cust_name;
            $isidata['sales'] = $d->sales_name;
            Vnet_Mod::create($isidata);
        }
        $this->info('Save to SQL executed successfully!');

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

        Mail::send(
            'smec',
            compact('data_customer','data_sales','data_brand','loopperiode'),
            function ($message) {
                $message
                    ->to("arif@smcindonesia.com", "ARIF")
                    ->subject("REPORT");
                $message
                    ->to("naufal@smcindonesia.com", "NAUFAL")
                    ->subject("REPORT");
                $message
                    ->to("gamenaufal27@gmail.com", "NAUFAL JUGA")
                    ->subject("REPORT");
                $message->from("helpdesk@riyadi.co.id", "SYSTEM");
            }
        );
        // END SEND MAIL
        $this->info('Email sucessfully sended!');
    }
}
