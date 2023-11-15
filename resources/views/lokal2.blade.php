<!-- START TABLE HANYA BRAND TERTENTU -->
<table border="1">
        <tr>
            <td>MONTH</td>
            <td>SMC</td>
            <td>RJB</td>
            <td>RPM</td>
        </tr>
        <?php
        $totalsmc_jan = 0;
        $totalrjb_jan = 0;
        $totalrpm_jan = 0;
        $totalsmc_feb = 0;
        $totalrjb_feb = 0;
        $totalrpm_feb = 0;
        $totalsmc_mar = 0;
        $totalrjb_mar = 0;
        $totalrpm_mar = 0;
        $totalsmc_apr = 0;
        $totalrjb_apr = 0;
        $totalrpm_apr = 0;
        $totalsmc_may = 0;
        $totalrjb_may = 0;
        $totalrpm_may = 0;
        $totalsmc_jun = 0;
        $totalrjb_jun = 0;
        $totalrpm_jun = 0;
        $totalsmc_jul = 0;
        $totalrjb_jul = 0;
        $totalrpm_jul = 0;
        $totalsmc_aug = 0;
        $totalrjb_aug = 0;
        $totalrpm_aug = 0;
        $totalsmc_sep = 0;
        $totalrjb_sep = 0;
        $totalrpm_sep = 0;
        $totalsmc_oct = 0;
        $totalrjb_oct = 0;
        $totalrpm_oct = 0;
        $totalsmc_nov = 0;
        $totalrjb_nov = 0;
        $totalrpm_nov = 0;
        $totalsmc_dec = 0;
        $totalrjb_dec = 0;
        $totalrpm_dec = 0;
        
            for($i=1;$i<=12;$i++){
                
                $monthName = date('F', mktime(0, 0, 0, $i, 1));
            ?>
        <tr>
            <td><?= strtoupper($monthName) ?></td>
            <td>
            </td>
            <td></td>
            <td></td>
        </tr>
        <?php } ?>
    </table>
    <!-- END TABLE HANYA BRAND TERTENTU -->