<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\SQ_NotApproved_Mod;

class InsertSQLMY extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SAVE-ORACLE-TO-MYSQL-MY';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SAMA KAYA YANG ERP CUMA BUAT SMEC';

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
        $this->info('Command executed successfully!');
    }
}
