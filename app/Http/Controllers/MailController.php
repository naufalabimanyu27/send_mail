<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function basic_email()
    {
        $ptsmcb = DB::connection("PTSMCB")->select("
                SELECT *
FROM (
    SELECT X.ERP, X.BRAND, X.TAHUN, X.BULAN, NVL(Z.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET
    FROM (
        SELECT ERP, BRAND, TAHUN, BULAN
        FROM (
            SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE
        ) A,
        (
            SELECT TO_CHAR(SYSDATE, 'YYYY') TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN
            FROM dual
            CONNECT BY LEVEL <= 12
        ) B
        ORDER BY BRAND, BULAN ASC
    ) X
    LEFT JOIN (
        SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_NUMBER(TO_CHAR(DSI_DATE, 'MM')) BULAN,
               NVL(SUM(DSI_DPP_NET), 0) AS TOTAL_DSI_DPP_NET
        FROM V_BRAND_NETSALE
        WHERE 
            (TO_CHAR(SYSDATE, 'MM') = '01' AND 
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-01-01', 'YYYY-MM-DD') AND 
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-12-31', 'YYYY-MM-DD'))
            OR
            (TO_CHAR(SYSDATE, 'MM') != '01' AND
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || '-01-01', 'YYYY-MM-DD') AND
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || TO_CHAR(SYSDATE, 'MM') - 1 || '-31', 'YYYY-MM-DD'))
        GROUP BY ERP, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM'), BRAND
        ORDER BY BRAND ASC, BULAN DESC
    ) Z
    ON X.ERP = Z.ERP AND X.BRAND = Z.BRAND AND X.TAHUN = Z.TAHUN AND X.BULAN = Z.BULAN
)
PIVOT (
    SUM(TOTAL_DSI_DPP_NET)
    FOR BULAN IN ('01' as jan, '02' as feb, '03' as mar, '04' as apr, '05' as may, '06' as jun, 
                 '07' as jul, '08' as aug, '09' as sep, '10' as oct, '11' as nov, '12' as dec)
)
        ");

        $ptseit = DB::connection("PTSEIT")->select("
                SELECT *
FROM (
    SELECT X.ERP, X.BRAND, X.TAHUN, X.BULAN, NVL(Z.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET
    FROM (
        SELECT ERP, BRAND, TAHUN, BULAN
        FROM (
            SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE
        ) A,
        (
            SELECT TO_CHAR(SYSDATE, 'YYYY') TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN
            FROM dual
            CONNECT BY LEVEL <= 12
        ) B
        ORDER BY BRAND, BULAN ASC
    ) X
    LEFT JOIN (
        SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_NUMBER(TO_CHAR(DSI_DATE, 'MM')) BULAN,
               NVL(SUM(DSI_DPP_NET), 0) AS TOTAL_DSI_DPP_NET
        FROM V_BRAND_NETSALE
        WHERE 
            (TO_CHAR(SYSDATE, 'MM') = '01' AND 
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-01-01', 'YYYY-MM-DD') AND 
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-12-31', 'YYYY-MM-DD'))
            OR
            (TO_CHAR(SYSDATE, 'MM') != '01' AND
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || '-01-01', 'YYYY-MM-DD') AND
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || TO_CHAR(SYSDATE, 'MM') - 1 || '-31', 'YYYY-MM-DD'))
        GROUP BY ERP, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM'), BRAND
        ORDER BY BRAND ASC, BULAN DESC
    ) Z
    ON X.ERP = Z.ERP AND X.BRAND = Z.BRAND AND X.TAHUN = Z.TAHUN AND X.BULAN = Z.BULAN
)
PIVOT (
    SUM(TOTAL_DSI_DPP_NET)
    FOR BULAN IN ('01' as jan, '02' as feb, '03' as mar, '04' as apr, '05' as may, '06' as jun, 
                 '07' as jul, '08' as aug, '09' as sep, '10' as oct, '11' as nov, '12' as dec)
)
        ");

        $ptseib = DB::connection("PTSEIB")->select("
                SELECT *
FROM (
    SELECT X.ERP, X.BRAND, X.TAHUN, X.BULAN, NVL(Z.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET
    FROM (
        SELECT ERP, BRAND, TAHUN, BULAN
        FROM (
            SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE
        ) A,
        (
            SELECT TO_CHAR(SYSDATE, 'YYYY') TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN
            FROM dual
            CONNECT BY LEVEL <= 12
        ) B
        ORDER BY BRAND, BULAN ASC
    ) X
    LEFT JOIN (
        SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_NUMBER(TO_CHAR(DSI_DATE, 'MM')) BULAN,
               NVL(SUM(DSI_DPP_NET), 0) AS TOTAL_DSI_DPP_NET
        FROM V_BRAND_NETSALE
        WHERE 
            (TO_CHAR(SYSDATE, 'MM') = '01' AND 
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-01-01', 'YYYY-MM-DD') AND 
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-12-31', 'YYYY-MM-DD'))
            OR
            (TO_CHAR(SYSDATE, 'MM') != '01' AND
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || '-01-01', 'YYYY-MM-DD') AND
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || TO_CHAR(SYSDATE, 'MM') - 1 || '-31', 'YYYY-MM-DD'))
        GROUP BY ERP, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM'), BRAND
        ORDER BY BRAND ASC, BULAN DESC
    ) Z
    ON X.ERP = Z.ERP AND X.BRAND = Z.BRAND AND X.TAHUN = Z.TAHUN AND X.BULAN = Z.BULAN
)
PIVOT (
    SUM(TOTAL_DSI_DPP_NET)
    FOR BULAN IN ('01' as jan, '02' as feb, '03' as mar, '04' as apr, '05' as may, '06' as jun, 
                 '07' as jul, '08' as aug, '09' as sep, '10' as oct, '11' as nov, '12' as dec)
)
        ");

        $ptrjb = DB::connection("PTRJB")->select("
                SELECT *
FROM (
    SELECT X.ERP, X.BRAND, X.TAHUN, X.BULAN, NVL(Z.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET
    FROM (
        SELECT ERP, BRAND, TAHUN, BULAN
        FROM (
            SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE
        ) A,
        (
            SELECT TO_CHAR(SYSDATE, 'YYYY') TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN
            FROM dual
            CONNECT BY LEVEL <= 12
        ) B
        ORDER BY BRAND, BULAN ASC
    ) X
    LEFT JOIN (
        SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_NUMBER(TO_CHAR(DSI_DATE, 'MM')) BULAN,
               NVL(SUM(DSI_DPP_NET), 0) AS TOTAL_DSI_DPP_NET
        FROM V_BRAND_NETSALE
        WHERE 
            (TO_CHAR(SYSDATE, 'MM') = '01' AND 
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-01-01', 'YYYY-MM-DD') AND 
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-12-31', 'YYYY-MM-DD'))
            OR
            (TO_CHAR(SYSDATE, 'MM') != '01' AND
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || '-01-01', 'YYYY-MM-DD') AND
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || TO_CHAR(SYSDATE, 'MM') - 1 || '-31', 'YYYY-MM-DD'))
        GROUP BY ERP, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM'), BRAND
        ORDER BY BRAND ASC, BULAN DESC
    ) Z
    ON X.ERP = Z.ERP AND X.BRAND = Z.BRAND AND X.TAHUN = Z.TAHUN AND X.BULAN = Z.BULAN
)
PIVOT (
    SUM(TOTAL_DSI_DPP_NET)
    FOR BULAN IN ('01' as jan, '02' as feb, '03' as mar, '04' as apr, '05' as may, '06' as jun, 
                 '07' as jul, '08' as aug, '09' as sep, '10' as oct, '11' as nov, '12' as dec)
)
        ");

        $ptrpm = DB::connection("PTRPM")->select("
                SELECT *
FROM (
    SELECT X.ERP, X.BRAND, X.TAHUN, X.BULAN, NVL(Z.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET
    FROM (
        SELECT ERP, BRAND, TAHUN, BULAN
        FROM (
            SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE
        ) A,
        (
            SELECT TO_CHAR(SYSDATE, 'YYYY') TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN
            FROM dual
            CONNECT BY LEVEL <= 12
        ) B
        ORDER BY BRAND, BULAN ASC
    ) X
    LEFT JOIN (
        SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_NUMBER(TO_CHAR(DSI_DATE, 'MM')) BULAN,
               NVL(SUM(DSI_DPP_NET), 0) AS TOTAL_DSI_DPP_NET
        FROM V_BRAND_NETSALE
        WHERE 
            (TO_CHAR(SYSDATE, 'MM') = '01' AND 
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-01-01', 'YYYY-MM-DD') AND 
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-12-31', 'YYYY-MM-DD'))
            OR
            (TO_CHAR(SYSDATE, 'MM') != '01' AND
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || '-01-01', 'YYYY-MM-DD') AND
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || TO_CHAR(SYSDATE, 'MM') - 1 || '-31', 'YYYY-MM-DD'))
        GROUP BY ERP, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM'), BRAND
        ORDER BY BRAND ASC, BULAN DESC
    ) Z
    ON X.ERP = Z.ERP AND X.BRAND = Z.BRAND AND X.TAHUN = Z.TAHUN AND X.BULAN = Z.BULAN
)
PIVOT (
    SUM(TOTAL_DSI_DPP_NET)
    FOR BULAN IN ('01' as jan, '02' as feb, '03' as mar, '04' as apr, '05' as may, '06' as jun, 
                 '07' as jul, '08' as aug, '09' as sep, '10' as oct, '11' as nov, '12' as dec)
)
        ");

        return view(
            "mail2",
            compact("ptsmcb", "ptseib", "ptseit", "ptrjb", "ptrpm")
        );
        // return view('mail2');
    }
    public function html_email()
    {
        // START PENGIRIMAN DATA -1 BULAN
        $ptsmcb = DB::connection("PTSMCB")->select("
                SELECT *
FROM (
    SELECT X.ERP, X.BRAND, X.TAHUN, X.BULAN, NVL(Z.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET
    FROM (
        SELECT ERP, BRAND, TAHUN, BULAN
        FROM (
            SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE
        ) A,
        (
            SELECT TO_CHAR(SYSDATE, 'YYYY') TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN
            FROM dual
            CONNECT BY LEVEL <= 12
        ) B
        ORDER BY BRAND, BULAN ASC
    ) X
    LEFT JOIN (
        SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_NUMBER(TO_CHAR(DSI_DATE, 'MM')) BULAN,
               NVL(SUM(DSI_DPP_NET), 0) AS TOTAL_DSI_DPP_NET
        FROM V_BRAND_NETSALE
        WHERE 
            (TO_CHAR(SYSDATE, 'MM') = '01' AND 
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-01-01', 'YYYY-MM-DD') AND 
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-12-31', 'YYYY-MM-DD'))
            OR
            (TO_CHAR(SYSDATE, 'MM') != '01' AND
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || '-01-01', 'YYYY-MM-DD') AND
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || TO_CHAR(SYSDATE, 'MM') - 1 || '-31', 'YYYY-MM-DD'))
        GROUP BY ERP, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM'), BRAND
        ORDER BY BRAND ASC, BULAN DESC
    ) Z
    ON X.ERP = Z.ERP AND X.BRAND = Z.BRAND AND X.TAHUN = Z.TAHUN AND X.BULAN = Z.BULAN
)
PIVOT (
    SUM(TOTAL_DSI_DPP_NET)
    FOR BULAN IN ('01' as jan, '02' as feb, '03' as mar, '04' as apr, '05' as may, '06' as jun, 
                 '07' as jul, '08' as aug, '09' as sep, '10' as oct, '11' as nov, '12' as dec)
)
        ");

        $ptseit = DB::connection("PTSEIT")->select("
                SELECT *
FROM (
    SELECT X.ERP, X.BRAND, X.TAHUN, X.BULAN, NVL(Z.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET
    FROM (
        SELECT ERP, BRAND, TAHUN, BULAN
        FROM (
            SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE
        ) A,
        (
            SELECT TO_CHAR(SYSDATE, 'YYYY') TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN
            FROM dual
            CONNECT BY LEVEL <= 12
        ) B
        ORDER BY BRAND, BULAN ASC
    ) X
    LEFT JOIN (
        SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_NUMBER(TO_CHAR(DSI_DATE, 'MM')) BULAN,
               NVL(SUM(DSI_DPP_NET), 0) AS TOTAL_DSI_DPP_NET
        FROM V_BRAND_NETSALE
        WHERE 
            (TO_CHAR(SYSDATE, 'MM') = '01' AND 
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-01-01', 'YYYY-MM-DD') AND 
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-12-31', 'YYYY-MM-DD'))
            OR
            (TO_CHAR(SYSDATE, 'MM') != '01' AND
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || '-01-01', 'YYYY-MM-DD') AND
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || TO_CHAR(SYSDATE, 'MM') - 1 || '-31', 'YYYY-MM-DD'))
        GROUP BY ERP, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM'), BRAND
        ORDER BY BRAND ASC, BULAN DESC
    ) Z
    ON X.ERP = Z.ERP AND X.BRAND = Z.BRAND AND X.TAHUN = Z.TAHUN AND X.BULAN = Z.BULAN
)
PIVOT (
    SUM(TOTAL_DSI_DPP_NET)
    FOR BULAN IN ('01' as jan, '02' as feb, '03' as mar, '04' as apr, '05' as may, '06' as jun, 
                 '07' as jul, '08' as aug, '09' as sep, '10' as oct, '11' as nov, '12' as dec)
)
        ");

        $ptseib = DB::connection("PTSEIB")->select("
                SELECT *
FROM (
    SELECT X.ERP, X.BRAND, X.TAHUN, X.BULAN, NVL(Z.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET
    FROM (
        SELECT ERP, BRAND, TAHUN, BULAN
        FROM (
            SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE
        ) A,
        (
            SELECT TO_CHAR(SYSDATE, 'YYYY') TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN
            FROM dual
            CONNECT BY LEVEL <= 12
        ) B
        ORDER BY BRAND, BULAN ASC
    ) X
    LEFT JOIN (
        SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_NUMBER(TO_CHAR(DSI_DATE, 'MM')) BULAN,
               NVL(SUM(DSI_DPP_NET), 0) AS TOTAL_DSI_DPP_NET
        FROM V_BRAND_NETSALE
        WHERE 
            (TO_CHAR(SYSDATE, 'MM') = '01' AND 
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-01-01', 'YYYY-MM-DD') AND 
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-12-31', 'YYYY-MM-DD'))
            OR
            (TO_CHAR(SYSDATE, 'MM') != '01' AND
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || '-01-01', 'YYYY-MM-DD') AND
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || TO_CHAR(SYSDATE, 'MM') - 1 || '-31', 'YYYY-MM-DD'))
        GROUP BY ERP, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM'), BRAND
        ORDER BY BRAND ASC, BULAN DESC
    ) Z
    ON X.ERP = Z.ERP AND X.BRAND = Z.BRAND AND X.TAHUN = Z.TAHUN AND X.BULAN = Z.BULAN
)
PIVOT (
    SUM(TOTAL_DSI_DPP_NET)
    FOR BULAN IN ('01' as jan, '02' as feb, '03' as mar, '04' as apr, '05' as may, '06' as jun, 
                 '07' as jul, '08' as aug, '09' as sep, '10' as oct, '11' as nov, '12' as dec)
)
        ");

        $ptrjb = DB::connection("PTRJB")->select("
                SELECT *
FROM (
    SELECT X.ERP, X.BRAND, X.TAHUN, X.BULAN, NVL(Z.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET
    FROM (
        SELECT ERP, BRAND, TAHUN, BULAN
        FROM (
            SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE
        ) A,
        (
            SELECT TO_CHAR(SYSDATE, 'YYYY') TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN
            FROM dual
            CONNECT BY LEVEL <= 12
        ) B
        ORDER BY BRAND, BULAN ASC
    ) X
    LEFT JOIN (
        SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_NUMBER(TO_CHAR(DSI_DATE, 'MM')) BULAN,
               NVL(SUM(DSI_DPP_NET), 0) AS TOTAL_DSI_DPP_NET
        FROM V_BRAND_NETSALE
        WHERE 
            (TO_CHAR(SYSDATE, 'MM') = '01' AND 
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-01-01', 'YYYY-MM-DD') AND 
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-12-31', 'YYYY-MM-DD'))
            OR
            (TO_CHAR(SYSDATE, 'MM') != '01' AND
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || '-01-01', 'YYYY-MM-DD') AND
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || TO_CHAR(SYSDATE, 'MM') - 1 || '-31', 'YYYY-MM-DD'))
        GROUP BY ERP, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM'), BRAND
        ORDER BY BRAND ASC, BULAN DESC
    ) Z
    ON X.ERP = Z.ERP AND X.BRAND = Z.BRAND AND X.TAHUN = Z.TAHUN AND X.BULAN = Z.BULAN
)
PIVOT (
    SUM(TOTAL_DSI_DPP_NET)
    FOR BULAN IN ('01' as jan, '02' as feb, '03' as mar, '04' as apr, '05' as may, '06' as jun, 
                 '07' as jul, '08' as aug, '09' as sep, '10' as oct, '11' as nov, '12' as dec)
)
        ");

        $ptrpm = DB::connection("PTRPM")->select("
                SELECT *
FROM (
    SELECT X.ERP, X.BRAND, X.TAHUN, X.BULAN, NVL(Z.TOTAL_DSI_DPP_NET, 0) TOTAL_DSI_DPP_NET
    FROM (
        SELECT ERP, BRAND, TAHUN, BULAN
        FROM (
            SELECT DISTINCT ERP, BRAND FROM V_BRAND_NETSALE
        ) A,
        (
            SELECT TO_CHAR(SYSDATE, 'YYYY') TAHUN, TO_CHAR(LEVEL, 'FM00') as BULAN
            FROM dual
            CONNECT BY LEVEL <= 12
        ) B
        ORDER BY BRAND, BULAN ASC
    ) X
    LEFT JOIN (
        SELECT ERP, BRAND, TO_CHAR(DSI_DATE, 'YYYY') TAHUN, TO_NUMBER(TO_CHAR(DSI_DATE, 'MM')) BULAN,
               NVL(SUM(DSI_DPP_NET), 0) AS TOTAL_DSI_DPP_NET
        FROM V_BRAND_NETSALE
        WHERE 
            (TO_CHAR(SYSDATE, 'MM') = '01' AND 
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-01-01', 'YYYY-MM-DD') AND 
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') - 1 || '-12-31', 'YYYY-MM-DD'))
            OR
            (TO_CHAR(SYSDATE, 'MM') != '01' AND
            DSI_DATE >= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || '-01-01', 'YYYY-MM-DD') AND
            DSI_DATE <= TO_DATE(TO_CHAR(SYSDATE, 'YYYY') || TO_CHAR(SYSDATE, 'MM') - 1 || '-31', 'YYYY-MM-DD'))
        GROUP BY ERP, TO_CHAR(DSI_DATE, 'YYYY'), TO_CHAR(DSI_DATE, 'MM'), BRAND
        ORDER BY BRAND ASC, BULAN DESC
    ) Z
    ON X.ERP = Z.ERP AND X.BRAND = Z.BRAND AND X.TAHUN = Z.TAHUN AND X.BULAN = Z.BULAN
)
PIVOT (
    SUM(TOTAL_DSI_DPP_NET)
    FOR BULAN IN ('01' as jan, '02' as feb, '03' as mar, '04' as apr, '05' as may, '06' as jun, 
                 '07' as jul, '08' as aug, '09' as sep, '10' as oct, '11' as nov, '12' as dec)
)
        ");
        // END PENGIRIMAN DATA -1 BULAN

        Mail::send(
            "mail2",
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
