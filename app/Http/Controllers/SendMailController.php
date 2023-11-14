<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class SendMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // START PENGIRIMAN DATA -1 BULAN
        $ptsmcb = DB::connection("PTSMCB")->select(
            "SELECT O.ERP, O.BRAND, O.TAHUN TAHUN_OLD, N.TAHUN_NEW, O.JAN_OLD+ O.FEB_OLD+ O.MAR_OLD+ O.APR_OLD+ O.MAY_OLD+ O.JUN_OLD+ O.JUL_OLD+ O.AUG_OLD+ O.SEP_OLD+ O.OCT_OLD+ O.NOV_OLD+ O.DEC_OLD TOTAL_OLD, N.JAN_NEW+ N.FEB_NEW+ N.MAR_NEW+ N.APR_NEW+ N.MAY_NEW+ N.JUN_NEW+ N.JUL_NEW+ N.AUG_NEW+ N.SEP_NEW+ N.OCT_NEW+ N.NOV_NEW+ N.DEC_NEW TOTAL_NEW, O.JAN_OLD, N.JAN_NEW, O.FEB_OLD, N.FEB_NEW, O.MAR_OLD, N.MAR_NEW, O.APR_OLD, N.APR_NEW, O.MAY_OLD, N.MAY_NEW, O.JUN_OLD, N.JUN_NEW, O.JUL_OLD, N.JUL_NEW, O.AUG_OLD, N.AUG_NEW, O.SEP_OLD, N.SEP_NEW, O.OCT_OLD, N.OCT_NEW, O.NOV_OLD, N.NOV_NEW, O.DEC_OLD, N.DEC_NEW FROM ( SELECT * FROM ( SELECT H.ERP, H.BRAND, H.TAHUN, H.BULAN, NVL(I.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET FROM ( SELECT ERP, BRAND, BULAN, TAHUN FROM ( SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE ) A, ( SELECT CASE WHEN TO_CHAR(SYSDATE, 'MM') != '01' THEN TO_CHAR(SYSDATE, 'YYYY') -1 WHEN TO_CHAR(SYSDATE, 'MM') = '01' THEN TO_CHAR(SYSDATE, 'YYYY') -2 END TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN FROM dual CONNECT BY LEVEL <= 12 ) B ORDER BY BRAND, BULAN ASC ) H LEFT JOIN ( SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_CHAR(DSI_DATE, 'MM') BULAN, SUM( NVL(DSI_DPP_NET, 0) ) TOTAL_DSI_DPP_NET FROM V_BRAND_NETSALE WHERE ( TO_CHAR(SYSDATE, 'MM') = '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -2 || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -2 || '-12-31', 'YYYY-MM-DD' ) ) OR ( TO_CHAR(SYSDATE, 'MM') != '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-12-31', 'YYYY-MM-DD' ) ) GROUP BY ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM') ORDER BY BRAND, BULAN ASC ) I ON H.BRAND = I.BRAND AND H.ERP = I.ERP AND H.TAHUN = I.TAHUN AND H.BULAN = I.BULAN ) PIVOT ( SUM(TOTAL_DSI_DPP_NET) FOR BULAN IN ( '01' as jan_old, '02' as feb_old, '03' as mar_old, '04' as apr_old, '05' as may_old, '06' as jun_old, '07' as jul_old, '08' as aug_old, '09' as sep_old, '10' as oct_old, '11' as nov_old, '12' as dec_old ) ) ) O INNER JOIN ( SELECT * FROM ( SELECT X.ERP, X.BRAND, X.TAHUN TAHUN_NEW, X.BULAN, NVL(Z.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET FROM ( SELECT ERP, BRAND, TAHUN, BULAN FROM ( SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE ) A, ( SELECT TO_CHAR(SYSDATE, 'YYYY') TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN FROM dual CONNECT BY LEVEL <= 12 ) B ORDER BY BRAND, BULAN ASC ) X LEFT JOIN ( SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_NUMBER( TO_CHAR(DSI_DATE, 'MM') ) BULAN, NVL( SUM(DSI_DPP_NET), 0 ) AS TOTAL_DSI_DPP_NET FROM V_BRAND_NETSALE WHERE ( TO_CHAR(SYSDATE, 'MM') = '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-12-31', 'YYYY-MM-DD' ) ) OR ( TO_CHAR(SYSDATE, 'MM') != '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') || TO_CHAR(SYSDATE, 'MM') -1 || '-31', 'YYYY-MM-DD' ) ) GROUP BY ERP, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM'), BRAND ORDER BY BRAND ASC, BULAN DESC ) Z ON X.ERP = Z.ERP AND X.BRAND = Z.BRAND AND X.TAHUN = Z.TAHUN AND X.BULAN = Z.BULAN ) PIVOT ( SUM(TOTAL_DSI_DPP_NET) FOR BULAN IN ( '01' as jan_new, '02' as feb_new, '03' as mar_new, '04' as apr_new, '05' as may_new, '06' as jun_new, '07' as jul_new, '08' as aug_new, '09' as sep_new, '10' as oct_new, '11' as nov_new, '12' as dec_new ) ) ) N ON O.BRAND = N.BRAND AND O.ERP = N.ERP ORDER BY BRAND ASC"
        );
        $ptseib = DB::connection("PTSEIB")->select(
            "SELECT O.ERP, O.BRAND, O.TAHUN TAHUN_OLD, N.TAHUN_NEW, O.JAN_OLD+ O.FEB_OLD+ O.MAR_OLD+ O.APR_OLD+ O.MAY_OLD+ O.JUN_OLD+ O.JUL_OLD+ O.AUG_OLD+ O.SEP_OLD+ O.OCT_OLD+ O.NOV_OLD+ O.DEC_OLD TOTAL_OLD, N.JAN_NEW+ N.FEB_NEW+ N.MAR_NEW+ N.APR_NEW+ N.MAY_NEW+ N.JUN_NEW+ N.JUL_NEW+ N.AUG_NEW+ N.SEP_NEW+ N.OCT_NEW+ N.NOV_NEW+ N.DEC_NEW TOTAL_NEW, O.JAN_OLD, N.JAN_NEW, O.FEB_OLD, N.FEB_NEW, O.MAR_OLD, N.MAR_NEW, O.APR_OLD, N.APR_NEW, O.MAY_OLD, N.MAY_NEW, O.JUN_OLD, N.JUN_NEW, O.JUL_OLD, N.JUL_NEW, O.AUG_OLD, N.AUG_NEW, O.SEP_OLD, N.SEP_NEW, O.OCT_OLD, N.OCT_NEW, O.NOV_OLD, N.NOV_NEW, O.DEC_OLD, N.DEC_NEW FROM ( SELECT * FROM ( SELECT H.ERP, H.BRAND, H.TAHUN, H.BULAN, NVL(I.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET FROM ( SELECT ERP, BRAND, BULAN, TAHUN FROM ( SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE ) A, ( SELECT CASE WHEN TO_CHAR(SYSDATE, 'MM') != '01' THEN TO_CHAR(SYSDATE, 'YYYY') -1 WHEN TO_CHAR(SYSDATE, 'MM') = '01' THEN TO_CHAR(SYSDATE, 'YYYY') -2 END TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN FROM dual CONNECT BY LEVEL <= 12 ) B ORDER BY BRAND, BULAN ASC ) H LEFT JOIN ( SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_CHAR(DSI_DATE, 'MM') BULAN, SUM( NVL(DSI_DPP_NET, 0) ) TOTAL_DSI_DPP_NET FROM V_BRAND_NETSALE WHERE ( TO_CHAR(SYSDATE, 'MM') = '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -2 || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -2 || '-12-31', 'YYYY-MM-DD' ) ) OR ( TO_CHAR(SYSDATE, 'MM') != '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-12-31', 'YYYY-MM-DD' ) ) GROUP BY ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM') ORDER BY BRAND, BULAN ASC ) I ON H.BRAND = I.BRAND AND H.ERP = I.ERP AND H.TAHUN = I.TAHUN AND H.BULAN = I.BULAN ) PIVOT ( SUM(TOTAL_DSI_DPP_NET) FOR BULAN IN ( '01' as jan_old, '02' as feb_old, '03' as mar_old, '04' as apr_old, '05' as may_old, '06' as jun_old, '07' as jul_old, '08' as aug_old, '09' as sep_old, '10' as oct_old, '11' as nov_old, '12' as dec_old ) ) ) O INNER JOIN ( SELECT * FROM ( SELECT X.ERP, X.BRAND, X.TAHUN TAHUN_NEW, X.BULAN, NVL(Z.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET FROM ( SELECT ERP, BRAND, TAHUN, BULAN FROM ( SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE ) A, ( SELECT TO_CHAR(SYSDATE, 'YYYY') TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN FROM dual CONNECT BY LEVEL <= 12 ) B ORDER BY BRAND, BULAN ASC ) X LEFT JOIN ( SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_NUMBER( TO_CHAR(DSI_DATE, 'MM') ) BULAN, NVL( SUM(DSI_DPP_NET), 0 ) AS TOTAL_DSI_DPP_NET FROM V_BRAND_NETSALE WHERE ( TO_CHAR(SYSDATE, 'MM') = '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-12-31', 'YYYY-MM-DD' ) ) OR ( TO_CHAR(SYSDATE, 'MM') != '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') || TO_CHAR(SYSDATE, 'MM') -1 || '-31', 'YYYY-MM-DD' ) ) GROUP BY ERP, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM'), BRAND ORDER BY BRAND ASC, BULAN DESC ) Z ON X.ERP = Z.ERP AND X.BRAND = Z.BRAND AND X.TAHUN = Z.TAHUN AND X.BULAN = Z.BULAN ) PIVOT ( SUM(TOTAL_DSI_DPP_NET) FOR BULAN IN ( '01' as jan_new, '02' as feb_new, '03' as mar_new, '04' as apr_new, '05' as may_new, '06' as jun_new, '07' as jul_new, '08' as aug_new, '09' as sep_new, '10' as oct_new, '11' as nov_new, '12' as dec_new ) ) ) N ON O.BRAND = N.BRAND AND O.ERP = N.ERP ORDER BY BRAND ASC"
        );
        $ptseit = DB::connection("PTSEIT")->select(
            "SELECT O.ERP, O.BRAND, O.TAHUN TAHUN_OLD, N.TAHUN_NEW, O.JAN_OLD+ O.FEB_OLD+ O.MAR_OLD+ O.APR_OLD+ O.MAY_OLD+ O.JUN_OLD+ O.JUL_OLD+ O.AUG_OLD+ O.SEP_OLD+ O.OCT_OLD+ O.NOV_OLD+ O.DEC_OLD TOTAL_OLD, N.JAN_NEW+ N.FEB_NEW+ N.MAR_NEW+ N.APR_NEW+ N.MAY_NEW+ N.JUN_NEW+ N.JUL_NEW+ N.AUG_NEW+ N.SEP_NEW+ N.OCT_NEW+ N.NOV_NEW+ N.DEC_NEW TOTAL_NEW, O.JAN_OLD, N.JAN_NEW, O.FEB_OLD, N.FEB_NEW, O.MAR_OLD, N.MAR_NEW, O.APR_OLD, N.APR_NEW, O.MAY_OLD, N.MAY_NEW, O.JUN_OLD, N.JUN_NEW, O.JUL_OLD, N.JUL_NEW, O.AUG_OLD, N.AUG_NEW, O.SEP_OLD, N.SEP_NEW, O.OCT_OLD, N.OCT_NEW, O.NOV_OLD, N.NOV_NEW, O.DEC_OLD, N.DEC_NEW FROM ( SELECT * FROM ( SELECT H.ERP, H.BRAND, H.TAHUN, H.BULAN, NVL(I.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET FROM ( SELECT ERP, BRAND, BULAN, TAHUN FROM ( SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE ) A, ( SELECT CASE WHEN TO_CHAR(SYSDATE, 'MM') != '01' THEN TO_CHAR(SYSDATE, 'YYYY') -1 WHEN TO_CHAR(SYSDATE, 'MM') = '01' THEN TO_CHAR(SYSDATE, 'YYYY') -2 END TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN FROM dual CONNECT BY LEVEL <= 12 ) B ORDER BY BRAND, BULAN ASC ) H LEFT JOIN ( SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_CHAR(DSI_DATE, 'MM') BULAN, SUM( NVL(DSI_DPP_NET, 0) ) TOTAL_DSI_DPP_NET FROM V_BRAND_NETSALE WHERE ( TO_CHAR(SYSDATE, 'MM') = '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -2 || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -2 || '-12-31', 'YYYY-MM-DD' ) ) OR ( TO_CHAR(SYSDATE, 'MM') != '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-12-31', 'YYYY-MM-DD' ) ) GROUP BY ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM') ORDER BY BRAND, BULAN ASC ) I ON H.BRAND = I.BRAND AND H.ERP = I.ERP AND H.TAHUN = I.TAHUN AND H.BULAN = I.BULAN ) PIVOT ( SUM(TOTAL_DSI_DPP_NET) FOR BULAN IN ( '01' as jan_old, '02' as feb_old, '03' as mar_old, '04' as apr_old, '05' as may_old, '06' as jun_old, '07' as jul_old, '08' as aug_old, '09' as sep_old, '10' as oct_old, '11' as nov_old, '12' as dec_old ) ) ) O INNER JOIN ( SELECT * FROM ( SELECT X.ERP, X.BRAND, X.TAHUN TAHUN_NEW, X.BULAN, NVL(Z.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET FROM ( SELECT ERP, BRAND, TAHUN, BULAN FROM ( SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE ) A, ( SELECT TO_CHAR(SYSDATE, 'YYYY') TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN FROM dual CONNECT BY LEVEL <= 12 ) B ORDER BY BRAND, BULAN ASC ) X LEFT JOIN ( SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_NUMBER( TO_CHAR(DSI_DATE, 'MM') ) BULAN, NVL( SUM(DSI_DPP_NET), 0 ) AS TOTAL_DSI_DPP_NET FROM V_BRAND_NETSALE WHERE ( TO_CHAR(SYSDATE, 'MM') = '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-12-31', 'YYYY-MM-DD' ) ) OR ( TO_CHAR(SYSDATE, 'MM') != '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') || TO_CHAR(SYSDATE, 'MM') -1 || '-31', 'YYYY-MM-DD' ) ) GROUP BY ERP, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM'), BRAND ORDER BY BRAND ASC, BULAN DESC ) Z ON X.ERP = Z.ERP AND X.BRAND = Z.BRAND AND X.TAHUN = Z.TAHUN AND X.BULAN = Z.BULAN ) PIVOT ( SUM(TOTAL_DSI_DPP_NET) FOR BULAN IN ( '01' as jan_new, '02' as feb_new, '03' as mar_new, '04' as apr_new, '05' as may_new, '06' as jun_new, '07' as jul_new, '08' as aug_new, '09' as sep_new, '10' as oct_new, '11' as nov_new, '12' as dec_new ) ) ) N ON O.BRAND = N.BRAND AND O.ERP = N.ERP ORDER BY BRAND ASC"
        );
        $ptrjb = DB::connection("PTRJB")->select(
            "SELECT O.ERP, O.BRAND, O.TAHUN TAHUN_OLD, N.TAHUN_NEW, O.JAN_OLD+ O.FEB_OLD+ O.MAR_OLD+ O.APR_OLD+ O.MAY_OLD+ O.JUN_OLD+ O.JUL_OLD+ O.AUG_OLD+ O.SEP_OLD+ O.OCT_OLD+ O.NOV_OLD+ O.DEC_OLD TOTAL_OLD, N.JAN_NEW+ N.FEB_NEW+ N.MAR_NEW+ N.APR_NEW+ N.MAY_NEW+ N.JUN_NEW+ N.JUL_NEW+ N.AUG_NEW+ N.SEP_NEW+ N.OCT_NEW+ N.NOV_NEW+ N.DEC_NEW TOTAL_NEW, O.JAN_OLD, N.JAN_NEW, O.FEB_OLD, N.FEB_NEW, O.MAR_OLD, N.MAR_NEW, O.APR_OLD, N.APR_NEW, O.MAY_OLD, N.MAY_NEW, O.JUN_OLD, N.JUN_NEW, O.JUL_OLD, N.JUL_NEW, O.AUG_OLD, N.AUG_NEW, O.SEP_OLD, N.SEP_NEW, O.OCT_OLD, N.OCT_NEW, O.NOV_OLD, N.NOV_NEW, O.DEC_OLD, N.DEC_NEW FROM ( SELECT * FROM ( SELECT H.ERP, H.BRAND, H.TAHUN, H.BULAN, NVL(I.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET FROM ( SELECT ERP, BRAND, BULAN, TAHUN FROM ( SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE ) A, ( SELECT CASE WHEN TO_CHAR(SYSDATE, 'MM') != '01' THEN TO_CHAR(SYSDATE, 'YYYY') -1 WHEN TO_CHAR(SYSDATE, 'MM') = '01' THEN TO_CHAR(SYSDATE, 'YYYY') -2 END TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN FROM dual CONNECT BY LEVEL <= 12 ) B ORDER BY BRAND, BULAN ASC ) H LEFT JOIN ( SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_CHAR(DSI_DATE, 'MM') BULAN, SUM( NVL(DSI_DPP_NET, 0) ) TOTAL_DSI_DPP_NET FROM V_BRAND_NETSALE WHERE ( TO_CHAR(SYSDATE, 'MM') = '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -2 || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -2 || '-12-31', 'YYYY-MM-DD' ) ) OR ( TO_CHAR(SYSDATE, 'MM') != '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-12-31', 'YYYY-MM-DD' ) ) GROUP BY ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM') ORDER BY BRAND, BULAN ASC ) I ON H.BRAND = I.BRAND AND H.ERP = I.ERP AND H.TAHUN = I.TAHUN AND H.BULAN = I.BULAN ) PIVOT ( SUM(TOTAL_DSI_DPP_NET) FOR BULAN IN ( '01' as jan_old, '02' as feb_old, '03' as mar_old, '04' as apr_old, '05' as may_old, '06' as jun_old, '07' as jul_old, '08' as aug_old, '09' as sep_old, '10' as oct_old, '11' as nov_old, '12' as dec_old ) ) ) O INNER JOIN ( SELECT * FROM ( SELECT X.ERP, X.BRAND, X.TAHUN TAHUN_NEW, X.BULAN, NVL(Z.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET FROM ( SELECT ERP, BRAND, TAHUN, BULAN FROM ( SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE ) A, ( SELECT TO_CHAR(SYSDATE, 'YYYY') TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN FROM dual CONNECT BY LEVEL <= 12 ) B ORDER BY BRAND, BULAN ASC ) X LEFT JOIN ( SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_NUMBER( TO_CHAR(DSI_DATE, 'MM') ) BULAN, NVL( SUM(DSI_DPP_NET), 0 ) AS TOTAL_DSI_DPP_NET FROM V_BRAND_NETSALE WHERE ( TO_CHAR(SYSDATE, 'MM') = '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-12-31', 'YYYY-MM-DD' ) ) OR ( TO_CHAR(SYSDATE, 'MM') != '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') || TO_CHAR(SYSDATE, 'MM') -1 || '-31', 'YYYY-MM-DD' ) ) GROUP BY ERP, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM'), BRAND ORDER BY BRAND ASC, BULAN DESC ) Z ON X.ERP = Z.ERP AND X.BRAND = Z.BRAND AND X.TAHUN = Z.TAHUN AND X.BULAN = Z.BULAN ) PIVOT ( SUM(TOTAL_DSI_DPP_NET) FOR BULAN IN ( '01' as jan_new, '02' as feb_new, '03' as mar_new, '04' as apr_new, '05' as may_new, '06' as jun_new, '07' as jul_new, '08' as aug_new, '09' as sep_new, '10' as oct_new, '11' as nov_new, '12' as dec_new ) ) ) N ON O.BRAND = N.BRAND AND O.ERP = N.ERP ORDER BY BRAND ASC"
        );
        $ptrpm = DB::connection("PTRPM")->select(
            "SELECT O.ERP, O.BRAND, O.TAHUN TAHUN_OLD, N.TAHUN_NEW, O.JAN_OLD+ O.FEB_OLD+ O.MAR_OLD+ O.APR_OLD+ O.MAY_OLD+ O.JUN_OLD+ O.JUL_OLD+ O.AUG_OLD+ O.SEP_OLD+ O.OCT_OLD+ O.NOV_OLD+ O.DEC_OLD TOTAL_OLD, N.JAN_NEW+ N.FEB_NEW+ N.MAR_NEW+ N.APR_NEW+ N.MAY_NEW+ N.JUN_NEW+ N.JUL_NEW+ N.AUG_NEW+ N.SEP_NEW+ N.OCT_NEW+ N.NOV_NEW+ N.DEC_NEW TOTAL_NEW, O.JAN_OLD, N.JAN_NEW, O.FEB_OLD, N.FEB_NEW, O.MAR_OLD, N.MAR_NEW, O.APR_OLD, N.APR_NEW, O.MAY_OLD, N.MAY_NEW, O.JUN_OLD, N.JUN_NEW, O.JUL_OLD, N.JUL_NEW, O.AUG_OLD, N.AUG_NEW, O.SEP_OLD, N.SEP_NEW, O.OCT_OLD, N.OCT_NEW, O.NOV_OLD, N.NOV_NEW, O.DEC_OLD, N.DEC_NEW FROM ( SELECT * FROM ( SELECT H.ERP, H.BRAND, H.TAHUN, H.BULAN, NVL(I.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET FROM ( SELECT ERP, BRAND, BULAN, TAHUN FROM ( SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE ) A, ( SELECT CASE WHEN TO_CHAR(SYSDATE, 'MM') != '01' THEN TO_CHAR(SYSDATE, 'YYYY') -1 WHEN TO_CHAR(SYSDATE, 'MM') = '01' THEN TO_CHAR(SYSDATE, 'YYYY') -2 END TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN FROM dual CONNECT BY LEVEL <= 12 ) B ORDER BY BRAND, BULAN ASC ) H LEFT JOIN ( SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_CHAR(DSI_DATE, 'MM') BULAN, SUM( NVL(DSI_DPP_NET, 0) ) TOTAL_DSI_DPP_NET FROM V_BRAND_NETSALE WHERE ( TO_CHAR(SYSDATE, 'MM') = '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -2 || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -2 || '-12-31', 'YYYY-MM-DD' ) ) OR ( TO_CHAR(SYSDATE, 'MM') != '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-12-31', 'YYYY-MM-DD' ) ) GROUP BY ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM') ORDER BY BRAND, BULAN ASC ) I ON H.BRAND = I.BRAND AND H.ERP = I.ERP AND H.TAHUN = I.TAHUN AND H.BULAN = I.BULAN ) PIVOT ( SUM(TOTAL_DSI_DPP_NET) FOR BULAN IN ( '01' as jan_old, '02' as feb_old, '03' as mar_old, '04' as apr_old, '05' as may_old, '06' as jun_old, '07' as jul_old, '08' as aug_old, '09' as sep_old, '10' as oct_old, '11' as nov_old, '12' as dec_old ) ) ) O INNER JOIN ( SELECT * FROM ( SELECT X.ERP, X.BRAND, X.TAHUN TAHUN_NEW, X.BULAN, NVL(Z.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET FROM ( SELECT ERP, BRAND, TAHUN, BULAN FROM ( SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE ) A, ( SELECT TO_CHAR(SYSDATE, 'YYYY') TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN FROM dual CONNECT BY LEVEL <= 12 ) B ORDER BY BRAND, BULAN ASC ) X LEFT JOIN ( SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_NUMBER( TO_CHAR(DSI_DATE, 'MM') ) BULAN, NVL( SUM(DSI_DPP_NET), 0 ) AS TOTAL_DSI_DPP_NET FROM V_BRAND_NETSALE WHERE ( TO_CHAR(SYSDATE, 'MM') = '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') -1 || '-12-31', 'YYYY-MM-DD' ) ) OR ( TO_CHAR(SYSDATE, 'MM') != '01' AND DSI_DATE >= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') || '-01-01', 'YYYY-MM-DD' ) AND DSI_DATE <= TO_DATE( TO_CHAR(SYSDATE, 'YYYY') || TO_CHAR(SYSDATE, 'MM') -1 || '-31', 'YYYY-MM-DD' ) ) GROUP BY ERP, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM'), BRAND ORDER BY BRAND ASC, BULAN DESC ) Z ON X.ERP = Z.ERP AND X.BRAND = Z.BRAND AND X.TAHUN = Z.TAHUN AND X.BULAN = Z.BULAN ) PIVOT ( SUM(TOTAL_DSI_DPP_NET) FOR BULAN IN ( '01' as jan_new, '02' as feb_new, '03' as mar_new, '04' as apr_new, '05' as may_new, '06' as jun_new, '07' as jul_new, '08' as aug_new, '09' as sep_new, '10' as oct_new, '11' as nov_new, '12' as dec_new ) ) ) N ON O.BRAND = N.BRAND AND O.ERP = N.ERP ORDER BY BRAND ASC"
        );
        // END PENGIRIMAN DATA -1 BULAN

        Mail::send(
            "lokal",
            compact("ptsmcb", "ptseib", "ptseit", "ptrjb", "ptrpm"),
            function ($message) {
                $message
                    ->to("opayabumanyu@gmail.com", "DATA")
                    ->subject("REPORT");
                // $message
                //     ->to("arif@smcindonesia.com", "DATA")
                //     ->subject("REPORT");
                $message
                    ->to("naufal@smcindonesia.com", "DATA")
                    ->subject("REPORT");
                $message->from("helpdesk@riyadi.co.id", "IT");
            }
        );
        echo "Basic Email Sent. Check your inbox.";
    }
}
