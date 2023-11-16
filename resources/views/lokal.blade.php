<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <table border="1">
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
        $year_now = date('Y');
        $year_old = $year_now - 1;
        ?>
        <tr>
            <td rowspan="2">SYSTEM</td>
            <td rowspan="2">BRAND</td>
            <td rowspan="2">CUMULATIVE {{ $year_old }} PER BRAND</td>
            <td rowspan="2">CUMULATIVE {{ $year_now }} PER BRAND</td>
            <td rowspan="2">CHANGE (%)</td>
            <?php
            for($i=1;$i<=12;$i++){
                $monthName = date('F', mktime(0, 0, 0, $i, 1));
            ?>
            <td colspan="2">{{ $monthName }}</td>
            <?php } ?>
        </tr>
        <tr>
            <td>{{ $year_old }}</td>
            <td>{{ $year_now }}</td>
            <td>{{ $year_old }}</td>
            <td>{{ $year_now }}</td>
            <td>{{ $year_old }}</td>
            <td>{{ $year_now }}</td>
            <td>{{ $year_old }}</td>
            <td>{{ $year_now }}</td>
            <td>{{ $year_old }}</td>
            <td>{{ $year_now }}</td>
            <td>{{ $year_old }}</td>
            <td>{{ $year_now }}</td>
            <td>{{ $year_old }}</td>
            <td>{{ $year_now }}</td>
            <td>{{ $year_old }}</td>
            <td>{{ $year_now }}</td>
            <td>{{ $year_old }}</td>
            <td>{{ $year_now }}</td>
            <td>{{ $year_old }}</td>
            <td>{{ $year_now }}</td>
            <td>{{ $year_old }}</td>
            <td>{{ $year_now }}</td>
            <td>{{ $year_old }}</td>
            <td>{{ $year_now }}</td>
        </tr>
        <?php
        $total_year_old = 0;
        $total_year_new = 0;
        $total_jan_old = 0;
        $total_jan_new = 0;
        $total_feb_old = 0;
        $total_feb_new = 0;
        $total_mar_old = 0;
        $total_mar_new = 0;
        $total_apr_old = 0;
        $total_apr_new = 0;
        $total_may_old = 0;
        $total_may_new = 0;
        $total_jun_old = 0;
        $total_jun_new = 0;
        $total_jul_old = 0;
        $total_jul_new = 0;
        $total_aug_old = 0;
        $total_aug_new = 0;
        $total_sep_old = 0;
        $total_sep_new = 0;
        $total_oct_old = 0;
        $total_oct_new = 0;
        $total_nov_old = 0;
        $total_nov_new = 0;
        $total_dec_old = 0;
        $total_dec_new = 0;
        
        ?>
        <!-- START SMCB -->
        <?php
        $i = 0;
        foreach ($ptsmcb as $d) {
            if ($d->total_old != 0 or $d->total_new != 0) {
                $i++;
            }
        }
        $x = 0;
        ?>
        @foreach ($ptsmcb as $d)
            <?php if($d->total_old != 0 or $d->total_new != 0){ ?>
            <tr style="background-color: lightgrey;">
                <?php 
                if($x == 0) {?>
                <td rowspan="{{ $i }}">{{ $d->erp }}</td>
                <?php $x++;}?>
                <td>{{ $d->brand }}</td>
                <td style="text-align:right;">
                    <?php
                    $total_year_old = $total_year_old + $d->total_old;
                    echo number_format($d->total_old, 2, '.', ',');
                    ?>
                </td>
                <td style="text-align:right;">
                    <?php
                    $total_year_new = $total_year_new + $d->total_new;
                    echo number_format($d->total_new, 2, '.', ',');
                    ?>
                </td>
                <td style="text-align:right;">
                    <?= $d->total_old != 0 ? number_format((($d->total_new / $d->total_old)-1) * 100, 2, '.', ',') : 0 ?>
                </td>
                <td style="text-align:right;">{{ number_format($d->jan_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jan_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->feb_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->feb_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->mar_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->mar_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->apr_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->apr_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->may_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->may_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jun_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jun_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jul_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jul_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->aug_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->aug_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->sep_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->sep_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->oct_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->oct_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->nov_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->nov_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->dec_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->dec_new, 2, '.', ',') }}</td>
            </tr>
            <?php 
        $total_jan_old=$total_jan_old+$d->jan_old;	$total_jan_new=$total_jan_new+$d->jan_new;
        $total_feb_old=$total_feb_old+$d->feb_old;	$total_feb_new=$total_feb_new+$d->feb_new;
        $total_mar_old=$total_mar_old+$d->mar_old;	$total_mar_new=$total_mar_new+$d->mar_new;
        $total_apr_old=$total_apr_old+$d->apr_old;	$total_apr_new=$total_apr_new+$d->apr_new;
        $total_may_old=$total_may_old+$d->may_old;	$total_may_new=$total_may_new+$d->may_new;
        $total_jun_old=$total_jun_old+$d->jun_old;	$total_jun_new=$total_jun_new+$d->jun_new;
        $total_jul_old=$total_jul_old+$d->jul_old;	$total_jul_new=$total_jul_new+$d->jul_new;
        $total_aug_old=$total_aug_old+$d->aug_old;	$total_aug_new=$total_aug_new+$d->aug_new;
        $total_sep_old=$total_sep_old+$d->sep_old;	$total_sep_new=$total_sep_new+$d->sep_new;
        $total_oct_old=$total_oct_old+$d->oct_old;	$total_oct_new=$total_oct_new+$d->oct_new;
        $total_nov_old=$total_nov_old+$d->nov_old;	$total_nov_new=$total_nov_new+$d->nov_new;
        $total_dec_old=$total_dec_old+$d->dec_old;	$total_dec_new=$total_dec_new+$d->dec_new;
        if($d->brand == "KOF" or $d->brand == "IKO" or $d->brand == "NAB" or $d->brand == "KKT" or $d->brand == "UNP" or $d->brand == "YUK"){
            $totalsmc_jan = $totalsmc_jan + $d->jan_new;
$totalsmc_feb = $totalsmc_feb + $d->feb_new;
$totalsmc_mar = $totalsmc_mar + $d->mar_new;
$totalsmc_apr = $totalsmc_apr + $d->apr_new;
$totalsmc_may = $totalsmc_may + $d->may_new;
$totalsmc_jun = $totalsmc_jun + $d->jun_new;
$totalsmc_jul = $totalsmc_jul + $d->jul_new;
$totalsmc_aug = $totalsmc_aug + $d->aug_new;
$totalsmc_sep = $totalsmc_sep + $d->sep_new;
$totalsmc_oct = $totalsmc_oct + $d->oct_new;
$totalsmc_nov = $totalsmc_nov + $d->nov_new;
$totalsmc_dec = $totalsmc_dec + $d->dec_new;
        }elseif ($d->brand == "NOR" or $d->brand == "RIV" or $d->brand == "OKE") {
            $totalrjb_jan = $totalrjb_jan + $d->jan_new;
$totalrjb_feb = $totalrjb_feb + $d->feb_new;
$totalrjb_mar = $totalrjb_mar + $d->mar_new;
$totalrjb_apr = $totalrjb_apr + $d->apr_new;
$totalrjb_may = $totalrjb_may + $d->may_new;
$totalrjb_jun = $totalrjb_jun + $d->jun_new;
$totalrjb_jul = $totalrjb_jul + $d->jul_new;
$totalrjb_aug = $totalrjb_aug + $d->aug_new;
$totalrjb_sep = $totalrjb_sep + $d->sep_new;
$totalrjb_oct = $totalrjb_oct + $d->oct_new;
$totalrjb_nov = $totalrjb_nov + $d->nov_new;
$totalrjb_dec = $totalrjb_dec + $d->dec_new;
        }elseif ($d->brand == "TOG" or $d->brand == "TON" or $d->brand == "BAR" or $d->brand == "NIG") {
            $totalrpm_jan = $totalrpm_jan + $d->jan_new;
$totalrpm_feb = $totalrpm_feb + $d->feb_new;
$totalrpm_mar = $totalrpm_mar + $d->mar_new;
$totalrpm_apr = $totalrpm_apr + $d->apr_new;
$totalrpm_may = $totalrpm_may + $d->may_new;
$totalrpm_jun = $totalrpm_jun + $d->jun_new;
$totalrpm_jul = $totalrpm_jul + $d->jul_new;
$totalrpm_aug = $totalrpm_aug + $d->aug_new;
$totalrpm_sep = $totalrpm_sep + $d->sep_new;
$totalrpm_oct = $totalrpm_oct + $d->oct_new;
$totalrpm_nov = $totalrpm_nov + $d->nov_new;
$totalrpm_dec = $totalrpm_dec + $d->dec_new;
        }
        } ?>
        @endforeach
        <!-- END SMCB -->
        <!-- START SEIB -->
        <?php
        $i = 0;
        foreach ($ptseib as $d) {
            if ($d->total_old != 0 or $d->total_new != 0) {
                $i++;
            }
        }
        $x = 0;
        ?>
        @foreach ($ptseib as $d)
            <?php if($d->total_old != 0 or $d->total_new != 0){ ?>
            <tr style="background-color: bisque;">
                <?php if($x == 0) {?>
                <td rowspan="{{ $i }}">{{ $d->erp }}</td>
                <?php $x++;}?>
                <td>{{ $d->brand }}</td>
                <td style="text-align:right;">
                    <?php
                    $total_year_old = $total_year_old + $d->total_old;
                    echo number_format($d->total_old, 2, '.', ',');
                    ?>
                </td>
                <td style="text-align:right;">
                    <?php
                    $total_year_new = $total_year_new + $d->total_new;
                    echo number_format($d->total_new, 2, '.', ',');
                    ?>
                </td>
                <td style="text-align:right;">
                    <?= $d->total_old != 0 ? number_format((($d->total_new / $d->total_old)-1) * 100, 2, '.', ',') : 0 ?>
                </td>
                <td style="text-align:right;">{{ number_format($d->jan_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jan_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->feb_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->feb_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->mar_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->mar_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->apr_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->apr_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->may_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->may_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jun_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jun_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jul_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jul_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->aug_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->aug_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->sep_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->sep_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->oct_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->oct_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->nov_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->nov_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->dec_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->dec_new, 2, '.', ',') }}</td>
            </tr>
            <?php 
        $total_jan_old=$total_jan_old+$d->jan_old;	$total_jan_new=$total_jan_new+$d->jan_new;
        $total_feb_old=$total_feb_old+$d->feb_old;	$total_feb_new=$total_feb_new+$d->feb_new;
        $total_mar_old=$total_mar_old+$d->mar_old;	$total_mar_new=$total_mar_new+$d->mar_new;
        $total_apr_old=$total_apr_old+$d->apr_old;	$total_apr_new=$total_apr_new+$d->apr_new;
        $total_may_old=$total_may_old+$d->may_old;	$total_may_new=$total_may_new+$d->may_new;
        $total_jun_old=$total_jun_old+$d->jun_old;	$total_jun_new=$total_jun_new+$d->jun_new;
        $total_jul_old=$total_jul_old+$d->jul_old;	$total_jul_new=$total_jul_new+$d->jul_new;
        $total_aug_old=$total_aug_old+$d->aug_old;	$total_aug_new=$total_aug_new+$d->aug_new;
        $total_sep_old=$total_sep_old+$d->sep_old;	$total_sep_new=$total_sep_new+$d->sep_new;
        $total_oct_old=$total_oct_old+$d->oct_old;	$total_oct_new=$total_oct_new+$d->oct_new;
        $total_nov_old=$total_nov_old+$d->nov_old;	$total_nov_new=$total_nov_new+$d->nov_new;
        $total_dec_old=$total_dec_old+$d->dec_old;	$total_dec_new=$total_dec_new+$d->dec_new;
        if($d->brand == "KOF" or $d->brand == "IKO" or $d->brand == "NAB" or $d->brand == "KKT" or $d->brand == "UNP" or $d->brand == "YUK"){
            $totalsmc_jan = $totalsmc_jan + $d->jan_new;
$totalsmc_feb = $totalsmc_feb + $d->feb_new;
$totalsmc_mar = $totalsmc_mar + $d->mar_new;
$totalsmc_apr = $totalsmc_apr + $d->apr_new;
$totalsmc_may = $totalsmc_may + $d->may_new;
$totalsmc_jun = $totalsmc_jun + $d->jun_new;
$totalsmc_jul = $totalsmc_jul + $d->jul_new;
$totalsmc_aug = $totalsmc_aug + $d->aug_new;
$totalsmc_sep = $totalsmc_sep + $d->sep_new;
$totalsmc_oct = $totalsmc_oct + $d->oct_new;
$totalsmc_nov = $totalsmc_nov + $d->nov_new;
$totalsmc_dec = $totalsmc_dec + $d->dec_new;
        }elseif ($d->brand == "NOR" or $d->brand == "RIV" or $d->brand == "OKE") {
            $totalrjb_jan = $totalrjb_jan + $d->jan_new;
$totalrjb_feb = $totalrjb_feb + $d->feb_new;
$totalrjb_mar = $totalrjb_mar + $d->mar_new;
$totalrjb_apr = $totalrjb_apr + $d->apr_new;
$totalrjb_may = $totalrjb_may + $d->may_new;
$totalrjb_jun = $totalrjb_jun + $d->jun_new;
$totalrjb_jul = $totalrjb_jul + $d->jul_new;
$totalrjb_aug = $totalrjb_aug + $d->aug_new;
$totalrjb_sep = $totalrjb_sep + $d->sep_new;
$totalrjb_oct = $totalrjb_oct + $d->oct_new;
$totalrjb_nov = $totalrjb_nov + $d->nov_new;
$totalrjb_dec = $totalrjb_dec + $d->dec_new;
        }elseif ($d->brand == "TOG" or $d->brand == "TON" or $d->brand == "BAR" or $d->brand == "NIG") {
            $totalrpm_jan = $totalrpm_jan + $d->jan_new;
$totalrpm_feb = $totalrpm_feb + $d->feb_new;
$totalrpm_mar = $totalrpm_mar + $d->mar_new;
$totalrpm_apr = $totalrpm_apr + $d->apr_new;
$totalrpm_may = $totalrpm_may + $d->may_new;
$totalrpm_jun = $totalrpm_jun + $d->jun_new;
$totalrpm_jul = $totalrpm_jul + $d->jul_new;
$totalrpm_aug = $totalrpm_aug + $d->aug_new;
$totalrpm_sep = $totalrpm_sep + $d->sep_new;
$totalrpm_oct = $totalrpm_oct + $d->oct_new;
$totalrpm_nov = $totalrpm_nov + $d->nov_new;
$totalrpm_dec = $totalrpm_dec + $d->dec_new;
        }
        
        } ?>
        @endforeach
        <!-- END SEIB -->
        <!-- START SEIT -->
        <?php
        $i = 0;
        foreach ($ptseit as $d) {
            if ($d->total_old != 0 or $d->total_new != 0) {
                $i++;
            }
        }
        $x = 0;
        ?>
        @foreach ($ptseit as $d)
            <?php if($d->total_old != 0 or $d->total_new != 0){ ?>
            <tr style="background-color: lightgrey;">
                <?php if($x == 0) {?>
                <td rowspan="{{ $i }}">{{ $d->erp }}</td>
                <?php $x++;}?>
                <td>{{ $d->brand }}</td>
                <td style="text-align:right;">
                    <?php
                    $total_year_old = $total_year_old + $d->total_old;
                    echo number_format($d->total_old, 2, '.', ',');
                    ?>
                </td>
                <td style="text-align:right;">
                    <?php
                    $total_year_new = $total_year_new + $d->total_new;
                    echo number_format($d->total_new, 2, '.', ',');
                    ?>
                </td>
                <td style="text-align:right;">
                    <?= $d->total_old != 0 ? number_format((($d->total_new / $d->total_old)-1) * 100, 2, '.', ',') : 0 ?>
                </td>
                <td style="text-align:right;">{{ number_format($d->jan_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jan_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->feb_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->feb_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->mar_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->mar_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->apr_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->apr_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->may_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->may_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jun_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jun_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jul_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jul_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->aug_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->aug_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->sep_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->sep_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->oct_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->oct_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->nov_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->nov_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->dec_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->dec_new, 2, '.', ',') }}</td>
            </tr>
            <?php 
        $total_jan_old=$total_jan_old+$d->jan_old;	$total_jan_new=$total_jan_new+$d->jan_new;
        $total_feb_old=$total_feb_old+$d->feb_old;	$total_feb_new=$total_feb_new+$d->feb_new;
        $total_mar_old=$total_mar_old+$d->mar_old;	$total_mar_new=$total_mar_new+$d->mar_new;
        $total_apr_old=$total_apr_old+$d->apr_old;	$total_apr_new=$total_apr_new+$d->apr_new;
        $total_may_old=$total_may_old+$d->may_old;	$total_may_new=$total_may_new+$d->may_new;
        $total_jun_old=$total_jun_old+$d->jun_old;	$total_jun_new=$total_jun_new+$d->jun_new;
        $total_jul_old=$total_jul_old+$d->jul_old;	$total_jul_new=$total_jul_new+$d->jul_new;
        $total_aug_old=$total_aug_old+$d->aug_old;	$total_aug_new=$total_aug_new+$d->aug_new;
        $total_sep_old=$total_sep_old+$d->sep_old;	$total_sep_new=$total_sep_new+$d->sep_new;
        $total_oct_old=$total_oct_old+$d->oct_old;	$total_oct_new=$total_oct_new+$d->oct_new;
        $total_nov_old=$total_nov_old+$d->nov_old;	$total_nov_new=$total_nov_new+$d->nov_new;
        $total_dec_old=$total_dec_old+$d->dec_old;	$total_dec_new=$total_dec_new+$d->dec_new;
        if($d->brand == "KOF" or $d->brand == "IKO" or $d->brand == "NAB" or $d->brand == "KKT" or $d->brand == "UNP" or $d->brand == "YUK"){
            $totalsmc_jan = $totalsmc_jan + $d->jan_new;
$totalsmc_feb = $totalsmc_feb + $d->feb_new;
$totalsmc_mar = $totalsmc_mar + $d->mar_new;
$totalsmc_apr = $totalsmc_apr + $d->apr_new;
$totalsmc_may = $totalsmc_may + $d->may_new;
$totalsmc_jun = $totalsmc_jun + $d->jun_new;
$totalsmc_jul = $totalsmc_jul + $d->jul_new;
$totalsmc_aug = $totalsmc_aug + $d->aug_new;
$totalsmc_sep = $totalsmc_sep + $d->sep_new;
$totalsmc_oct = $totalsmc_oct + $d->oct_new;
$totalsmc_nov = $totalsmc_nov + $d->nov_new;
$totalsmc_dec = $totalsmc_dec + $d->dec_new;
        }elseif ($d->brand == "NOR" or $d->brand == "RIV" or $d->brand == "OKE") {
            $totalrjb_jan = $totalrjb_jan + $d->jan_new;
$totalrjb_feb = $totalrjb_feb + $d->feb_new;
$totalrjb_mar = $totalrjb_mar + $d->mar_new;
$totalrjb_apr = $totalrjb_apr + $d->apr_new;
$totalrjb_may = $totalrjb_may + $d->may_new;
$totalrjb_jun = $totalrjb_jun + $d->jun_new;
$totalrjb_jul = $totalrjb_jul + $d->jul_new;
$totalrjb_aug = $totalrjb_aug + $d->aug_new;
$totalrjb_sep = $totalrjb_sep + $d->sep_new;
$totalrjb_oct = $totalrjb_oct + $d->oct_new;
$totalrjb_nov = $totalrjb_nov + $d->nov_new;
$totalrjb_dec = $totalrjb_dec + $d->dec_new;
        }elseif ($d->brand == "TOG" or $d->brand == "TON" or $d->brand == "BAR" or $d->brand == "NIG") {
            $totalrpm_jan = $totalrpm_jan + $d->jan_new;
$totalrpm_feb = $totalrpm_feb + $d->feb_new;
$totalrpm_mar = $totalrpm_mar + $d->mar_new;
$totalrpm_apr = $totalrpm_apr + $d->apr_new;
$totalrpm_may = $totalrpm_may + $d->may_new;
$totalrpm_jun = $totalrpm_jun + $d->jun_new;
$totalrpm_jul = $totalrpm_jul + $d->jul_new;
$totalrpm_aug = $totalrpm_aug + $d->aug_new;
$totalrpm_sep = $totalrpm_sep + $d->sep_new;
$totalrpm_oct = $totalrpm_oct + $d->oct_new;
$totalrpm_nov = $totalrpm_nov + $d->nov_new;
$totalrpm_dec = $totalrpm_dec + $d->dec_new;
        }
        
        } ?>
        @endforeach
        <!-- END SEIT -->
        <!-- START RJB -->
        <?php
        $i = 0;
        foreach ($ptrjb as $d) {
            if ($d->total_old != 0 or $d->total_new != 0) {
                $i++;
            }
        }
        $x = 0;
        ?>
        @foreach ($ptrjb as $d)
            <?php if($d->total_old != 0 or $d->total_new != 0){ ?>
            <tr style="background-color: bisque;">
                <?php if($x == 0) {?>
                <td rowspan="{{ $i }}">{{ $d->erp }}</td>
                <?php $x++;}?>
                <td>{{ $d->brand }}</td>
                <td style="text-align:right;">
                    <?php
                    $total_year_old = $total_year_old + $d->total_old;
                    echo number_format($d->total_old, 2, '.', ',');
                    ?>
                </td>
                <td style="text-align:right;">
                    <?php
                    $total_year_new = $total_year_new + $d->total_new;
                    echo number_format($d->total_new, 2, '.', ',');
                    ?>
                </td>
                <td style="text-align:right;">
                    <?= $d->total_old != 0 ? number_format((($d->total_new / $d->total_old)-1) * 100, 2, '.', ',') : 0 ?>
                </td>
                <td style="text-align:right;">{{ number_format($d->jan_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jan_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->feb_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->feb_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->mar_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->mar_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->apr_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->apr_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->may_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->may_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jun_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jun_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jul_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jul_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->aug_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->aug_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->sep_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->sep_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->oct_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->oct_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->nov_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->nov_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->dec_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->dec_new, 2, '.', ',') }}</td>
            </tr>
            <?php 
        $total_jan_old=$total_jan_old+$d->jan_old;	$total_jan_new=$total_jan_new+$d->jan_new;
        $total_feb_old=$total_feb_old+$d->feb_old;	$total_feb_new=$total_feb_new+$d->feb_new;
        $total_mar_old=$total_mar_old+$d->mar_old;	$total_mar_new=$total_mar_new+$d->mar_new;
        $total_apr_old=$total_apr_old+$d->apr_old;	$total_apr_new=$total_apr_new+$d->apr_new;
        $total_may_old=$total_may_old+$d->may_old;	$total_may_new=$total_may_new+$d->may_new;
        $total_jun_old=$total_jun_old+$d->jun_old;	$total_jun_new=$total_jun_new+$d->jun_new;
        $total_jul_old=$total_jul_old+$d->jul_old;	$total_jul_new=$total_jul_new+$d->jul_new;
        $total_aug_old=$total_aug_old+$d->aug_old;	$total_aug_new=$total_aug_new+$d->aug_new;
        $total_sep_old=$total_sep_old+$d->sep_old;	$total_sep_new=$total_sep_new+$d->sep_new;
        $total_oct_old=$total_oct_old+$d->oct_old;	$total_oct_new=$total_oct_new+$d->oct_new;
        $total_nov_old=$total_nov_old+$d->nov_old;	$total_nov_new=$total_nov_new+$d->nov_new;
        $total_dec_old=$total_dec_old+$d->dec_old;	$total_dec_new=$total_dec_new+$d->dec_new;
        if($d->brand == "KOF" or $d->brand == "IKO" or $d->brand == "NAB" or $d->brand == "KKT" or $d->brand == "UNP" or $d->brand == "YUK"){
            $totalsmc_jan = $totalsmc_jan + $d->jan_new;
$totalsmc_feb = $totalsmc_feb + $d->feb_new;
$totalsmc_mar = $totalsmc_mar + $d->mar_new;
$totalsmc_apr = $totalsmc_apr + $d->apr_new;
$totalsmc_may = $totalsmc_may + $d->may_new;
$totalsmc_jun = $totalsmc_jun + $d->jun_new;
$totalsmc_jul = $totalsmc_jul + $d->jul_new;
$totalsmc_aug = $totalsmc_aug + $d->aug_new;
$totalsmc_sep = $totalsmc_sep + $d->sep_new;
$totalsmc_oct = $totalsmc_oct + $d->oct_new;
$totalsmc_nov = $totalsmc_nov + $d->nov_new;
$totalsmc_dec = $totalsmc_dec + $d->dec_new;
        }elseif ($d->brand == "NOR" or $d->brand == "RIV" or $d->brand == "OKE") {
            $totalrjb_jan = $totalrjb_jan + $d->jan_new;
$totalrjb_feb = $totalrjb_feb + $d->feb_new;
$totalrjb_mar = $totalrjb_mar + $d->mar_new;
$totalrjb_apr = $totalrjb_apr + $d->apr_new;
$totalrjb_may = $totalrjb_may + $d->may_new;
$totalrjb_jun = $totalrjb_jun + $d->jun_new;
$totalrjb_jul = $totalrjb_jul + $d->jul_new;
$totalrjb_aug = $totalrjb_aug + $d->aug_new;
$totalrjb_sep = $totalrjb_sep + $d->sep_new;
$totalrjb_oct = $totalrjb_oct + $d->oct_new;
$totalrjb_nov = $totalrjb_nov + $d->nov_new;
$totalrjb_dec = $totalrjb_dec + $d->dec_new;
        }elseif ($d->brand == "TOG" or $d->brand == "TON" or $d->brand == "BAR" or $d->brand == "NIG") {
            $totalrpm_jan = $totalrpm_jan + $d->jan_new;
$totalrpm_feb = $totalrpm_feb + $d->feb_new;
$totalrpm_mar = $totalrpm_mar + $d->mar_new;
$totalrpm_apr = $totalrpm_apr + $d->apr_new;
$totalrpm_may = $totalrpm_may + $d->may_new;
$totalrpm_jun = $totalrpm_jun + $d->jun_new;
$totalrpm_jul = $totalrpm_jul + $d->jul_new;
$totalrpm_aug = $totalrpm_aug + $d->aug_new;
$totalrpm_sep = $totalrpm_sep + $d->sep_new;
$totalrpm_oct = $totalrpm_oct + $d->oct_new;
$totalrpm_nov = $totalrpm_nov + $d->nov_new;
$totalrpm_dec = $totalrpm_dec + $d->dec_new;
        }
        
        } ?>
        @endforeach
        <!-- END RJB -->
        <!-- START RPM -->
        <?php
        $i = 0;
        foreach ($ptrpm as $d) {
            if ($d->total_old != 0 or $d->total_new != 0) {
                $i++;
            }
        }
        $x = 0;
        ?>
        @foreach ($ptrpm as $d)
            <?php if($d->total_old != 0 or $d->total_new != 0){ ?>
            <tr style="background-color: lightgrey;">
                <?php if($x == 0) {?>
                <td rowspan="{{ $i }}">{{ $d->erp }}</td>
                <?php $x++;}?>
                <td>{{ $d->brand }}</td>
                <td style="text-align:right;">
                    <?php
                    $total_year_old = $total_year_old + $d->total_old;
                    echo number_format($d->total_old, 2, '.', ',');
                    ?>
                </td>
                <td style="text-align:right;">
                    <?php
                    $total_year_new = $total_year_new + $d->total_new;
                    echo number_format($d->total_new, 2, '.', ',');
                    ?>
                </td>
                <td style="text-align:right;">
                    <?= $d->total_old != 0 ? number_format((($d->total_new / $d->total_old)-1) * 100, 2, '.', ',') : 0 ?>
                </td>
                <td style="text-align:right;">{{ number_format($d->jan_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jan_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->feb_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->feb_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->mar_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->mar_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->apr_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->apr_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->may_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->may_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jun_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jun_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jul_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->jul_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->aug_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->aug_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->sep_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->sep_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->oct_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->oct_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->nov_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->nov_new, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->dec_old, 2, '.', ',') }}</td>
                <td style="text-align:right;">{{ number_format($d->dec_new, 2, '.', ',') }}</td>
            </tr>
            <?php 
        $total_jan_old=$total_jan_old+$d->jan_old;	$total_jan_new=$total_jan_new+$d->jan_new;
        $total_feb_old=$total_feb_old+$d->feb_old;	$total_feb_new=$total_feb_new+$d->feb_new;
        $total_mar_old=$total_mar_old+$d->mar_old;	$total_mar_new=$total_mar_new+$d->mar_new;
        $total_apr_old=$total_apr_old+$d->apr_old;	$total_apr_new=$total_apr_new+$d->apr_new;
        $total_may_old=$total_may_old+$d->may_old;	$total_may_new=$total_may_new+$d->may_new;
        $total_jun_old=$total_jun_old+$d->jun_old;	$total_jun_new=$total_jun_new+$d->jun_new;
        $total_jul_old=$total_jul_old+$d->jul_old;	$total_jul_new=$total_jul_new+$d->jul_new;
        $total_aug_old=$total_aug_old+$d->aug_old;	$total_aug_new=$total_aug_new+$d->aug_new;
        $total_sep_old=$total_sep_old+$d->sep_old;	$total_sep_new=$total_sep_new+$d->sep_new;
        $total_oct_old=$total_oct_old+$d->oct_old;	$total_oct_new=$total_oct_new+$d->oct_new;
        $total_nov_old=$total_nov_old+$d->nov_old;	$total_nov_new=$total_nov_new+$d->nov_new;
        $total_dec_old=$total_dec_old+$d->dec_old;	$total_dec_new=$total_dec_new+$d->dec_new;
        if($d->brand == "KOF" or $d->brand == "IKO" or $d->brand == "NAB" or $d->brand == "KKT" or $d->brand == "UNP" or $d->brand == "YUK"){
            $totalsmc_jan = $totalsmc_jan + $d->jan_new;
$totalsmc_feb = $totalsmc_feb + $d->feb_new;
$totalsmc_mar = $totalsmc_mar + $d->mar_new;
$totalsmc_apr = $totalsmc_apr + $d->apr_new;
$totalsmc_may = $totalsmc_may + $d->may_new;
$totalsmc_jun = $totalsmc_jun + $d->jun_new;
$totalsmc_jul = $totalsmc_jul + $d->jul_new;
$totalsmc_aug = $totalsmc_aug + $d->aug_new;
$totalsmc_sep = $totalsmc_sep + $d->sep_new;
$totalsmc_oct = $totalsmc_oct + $d->oct_new;
$totalsmc_nov = $totalsmc_nov + $d->nov_new;
$totalsmc_dec = $totalsmc_dec + $d->dec_new;
        }elseif ($d->brand == "NOR" or $d->brand == "RIV" or $d->brand == "OKE") {
            $totalrjb_jan = $totalrjb_jan + $d->jan_new;
$totalrjb_feb = $totalrjb_feb + $d->feb_new;
$totalrjb_mar = $totalrjb_mar + $d->mar_new;
$totalrjb_apr = $totalrjb_apr + $d->apr_new;
$totalrjb_may = $totalrjb_may + $d->may_new;
$totalrjb_jun = $totalrjb_jun + $d->jun_new;
$totalrjb_jul = $totalrjb_jul + $d->jul_new;
$totalrjb_aug = $totalrjb_aug + $d->aug_new;
$totalrjb_sep = $totalrjb_sep + $d->sep_new;
$totalrjb_oct = $totalrjb_oct + $d->oct_new;
$totalrjb_nov = $totalrjb_nov + $d->nov_new;
$totalrjb_dec = $totalrjb_dec + $d->dec_new;
        }elseif ($d->brand == "TOG" or $d->brand == "TON" or $d->brand == "BAR" or $d->brand == "NIG") {
            $totalrpm_jan = $totalrpm_jan + $d->jan_new;
$totalrpm_feb = $totalrpm_feb + $d->feb_new;
$totalrpm_mar = $totalrpm_mar + $d->mar_new;
$totalrpm_apr = $totalrpm_apr + $d->apr_new;
$totalrpm_may = $totalrpm_may + $d->may_new;
$totalrpm_jun = $totalrpm_jun + $d->jun_new;
$totalrpm_jul = $totalrpm_jul + $d->jul_new;
$totalrpm_aug = $totalrpm_aug + $d->aug_new;
$totalrpm_sep = $totalrpm_sep + $d->sep_new;
$totalrpm_oct = $totalrpm_oct + $d->oct_new;
$totalrpm_nov = $totalrpm_nov + $d->nov_new;
$totalrpm_dec = $totalrpm_dec + $d->dec_new;
        }
        
        } ?>
        @endforeach
        <!-- END RPM -->
        <tr>
            <td colspan="2">CUMULATIVE</td>
            <td style="text-align:right;">{{ number_format($total_year_old, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_year_new, 2, '.', ',') }}</td>
            <td style="text-align:right;">
                <?= $total_year_old != 0 ? number_format((($total_year_new / $total_year_old)-1) * 100, 2, '.', ',') : 0 ?>
            </td>
            <td style="text-align:right;">{{ number_format($total_jan_old, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_jan_new, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_feb_old, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_feb_new, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_mar_old, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_mar_new, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_apr_old, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_apr_new, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_may_old, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_may_new, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_jun_old, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_jun_new, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_jul_old, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_jul_new, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_aug_old, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_aug_new, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_sep_old, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_sep_new, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_oct_old, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_oct_new, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_nov_old, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_nov_new, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_dec_old, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($total_dec_new, 2, '.', ',') }}</td>

        </tr>
    </table>
    <hr>
    <!-- TABLE PER BRAND -->
    <?php
    $currentDate = new DateTime();
    $currentDate->modify('-1 month');
    // GABUNGIN ARRAY DARI BEDA SERVER JADI 1
    // JIKA ADA BRAND YANG SAMA DARI BEDA SYSTEM MAKA DI JUMLAHKAN
    $mergedArray = [];
    foreach (
        array_merge(
            array_map(function ($item) {
                return json_decode(json_encode($item), true);
            }, $ptsmcb),
            array_map(function ($item) {
                return json_decode(json_encode($item), true);
            }, $ptseib),
            array_map(function ($item) {
                return json_decode(json_encode($item), true);
            }, $ptseit),
            array_map(function ($item) {
                return json_decode(json_encode($item), true);
            }, $ptrjb),
            array_map(function ($item) {
                return json_decode(json_encode($item), true);
            }, $ptrpm),
        )
        as $entry
    ) {
        $brand = $entry['brand'];
        if (!isset($mergedArray[$brand])) {
            $mergedArray[$brand] = $entry;
        } else {
            $mergedArray[$brand]['jan_new'] += $entry['jan_new'];
            $mergedArray[$brand]['feb_new'] += $entry['feb_new'];
            $mergedArray[$brand]['mar_new'] += $entry['mar_new'];
            $mergedArray[$brand]['apr_new'] += $entry['apr_new'];
            $mergedArray[$brand]['may_new'] += $entry['may_new'];
            $mergedArray[$brand]['jun_new'] += $entry['jun_new'];
            $mergedArray[$brand]['jul_new'] += $entry['jul_new'];
            $mergedArray[$brand]['aug_new'] += $entry['aug_new'];
            $mergedArray[$brand]['sep_new'] += $entry['sep_new'];
            $mergedArray[$brand]['oct_new'] += $entry['oct_new'];
            $mergedArray[$brand]['nov_new'] += $entry['nov_new'];
            $mergedArray[$brand]['dec_new'] += $entry['dec_new'];
        }
    }
    
    $result = array_values($mergedArray);
    $data_brand = json_decode(json_encode($result));
    //ORDER DATA BRAND DESCENDING
    usort($data_brand, function ($item1, $item2) {
        $currentDate = new DateTime();
        $currentDate->modify('-1 month');
        if ($currentDate->format('m') == '01') {
            return $item2->jan_new <=> $item1->jan_new;
        } elseif ($currentDate->format('m') == '02') {
            return $item2->feb_new <=> $item1->feb_new;
        } elseif ($currentDate->format('m') == '03') {
            return $item2->mar_new <=> $item1->mar_new;
        } elseif ($currentDate->format('m') == '04') {
            return $item2->apr_new <=> $item1->apr_new;
        } elseif ($currentDate->format('m') == '05') {
            return $item2->may_new <=> $item1->may_new;
        } elseif ($currentDate->format('m') == '06') {
            return $item2->jun_new <=> $item1->jun_new;
        } elseif ($currentDate->format('m') == '07') {
            return $item2->jul_new <=> $item1->jul_new;
        } elseif ($currentDate->format('m') == '08') {
            return $item2->aug_new <=> $item1->aug_new;
        } elseif ($currentDate->format('m') == '09') {
            return $item2->sep_new <=> $item1->sep_new;
        } elseif ($currentDate->format('m') == '10') {
            return $item2->oct_new <=> $item1->oct_new;
        } elseif ($currentDate->format('m') == '11') {
            return $item2->nov_new <=> $item1->nov_new;
        } elseif ($currentDate->format('m') == '12') {
            return $item2->dec_new <=> $item1->dec_new;
        }
    });
    //END PERHITUNGAN BEDA SYSTEM SATU BRAND
    ?>
    <table border="1">
        <tr>
            <!-- <td>ERP</td> -->
            <td>BRAND</td>
            <td>
                <?php
                echo 'DATA ' . strtoupper($currentDate->format('F'));
                ?>
            </td>
            <td>% TERHADAP TOTAL <br>BULAN <?= strtoupper($currentDate->format('F')) ?></td>
        </tr>
        @foreach ($data_brand as $data)
        <?php $checkifmonthnull = "z";
       if ($currentDate->format("m") == "01" and $data->jan_new == 0) {
        $checkifmonthnull = "a";
    } elseif ($currentDate->format("m") == "02" and $data->feb_new == 0) {
        $checkifmonthnull = "a";
    } elseif ($currentDate->format("m") == "03" and $data->mar_new == 0) {
        $checkifmonthnull = "a";
    } elseif ($currentDate->format("m") == "04" and $data->apr_new == 0) {
        $checkifmonthnull = "a";
    } elseif ($currentDate->format("m") == "05" and $data->may_new == 0) {
        $checkifmonthnull = "a";
    } elseif ($currentDate->format("m") == "06" and $data->jun_new == 0) {
        $checkifmonthnull = "a";
    } elseif ($currentDate->format("m") == "07" and $data->jul_new == 0) {
        $checkifmonthnull = "a";
    } elseif ($currentDate->format("m") == "08" and $data->aug_new == 0) {
        $checkifmonthnull = "a";
    } elseif ($currentDate->format("m") == "09" and $data->sep_new == 0) {
        $checkifmonthnull = "a";
    } elseif ($currentDate->format("m") == "10" and $data->oct_new == 0) {
        $checkifmonthnull = "a";
    } elseif ($currentDate->format("m") == "11" and $data->nov_new == 0) {
        $checkifmonthnull = "a";
    } elseif ($currentDate->format("m") == "12" and $data->dec_new == 0) {
        $checkifmonthnull = "a";
    } 
        ?>
        @if($checkifmonthnull != "a")
            <tr>
                <!-- <td>{{ $data->erp }}</td> -->
                <td>{{ $data->brand }}</td>
                <td style="text-align:right;">
                <?php 
                if ($currentDate->format('m') == '01') {
                   echo number_format($data->jan_new, 2, '.', ',');
                } elseif ($currentDate->format('m') == '02') {
                    echo number_format($data->feb_new, 2, '.', ',');
                } elseif ($currentDate->format('m') == '03') {
                    echo number_format($data->mar_new, 2, '.', ',');
                } elseif ($currentDate->format('m') == '04') {
                    echo number_format($data->apr_new, 2, '.', ',');
                } elseif ($currentDate->format('m') == '05') {
                    echo number_format($data->may_new, 2, '.', ',');
                } elseif ($currentDate->format('m') == '06') {
                    echo number_format($data->jun_new, 2, '.', ',');
                } elseif ($currentDate->format('m') == '07') {
                    echo number_format($data->jul_new, 2, '.', ',');
                } elseif ($currentDate->format('m') == '08') {
                    echo number_format($data->aug_new, 2, '.', ',');
                } elseif ($currentDate->format('m') == '09') {
                    echo number_format($data->sep_new, 2, '.', ',');
                } elseif ($currentDate->format('m') == '10') {
                    echo number_format($data->oct_new, 2, '.', ',');
                } elseif ($currentDate->format('m') == '11') {
                    echo number_format($data->nov_new, 2, '.', ',');
                } elseif ($currentDate->format('m') == '12') {
                    echo number_format($data->dec_new, 2, '.', ',');
                }
                ?></td>
                    <?php if ($currentDate->format('m') == '01') {
                        if ($data->jan_new != 0) {
                            echo '<td style="text-align:right;">'.number_format(($data->jan_new / $total_jan_new) * 100, 2, '.', ',').'</td>';
                        } else {
                            echo '<td style="text-align:right;">0</td>';
                        }
                    } elseif ($currentDate->format('m') == '02') {
                        if ($data->feb_new != 0) {
                            echo '<td style="text-align:right;">'.number_format(($data->feb_new / $total_feb_new) * 100, 2, '.', ',').'</td>';
                        } else {
                            echo '<td style="text-align:right;">0</td>';
                        }
                    } elseif ($currentDate->format('m') == '03') {
                        if ($data->mar_new != 0) {
                            echo '<td style="text-align:right;">'.number_format(($data->mar_new / $total_mar_new) * 100, 2, '.', ',').'</td>';
                        } else {
                            echo '<td style="text-align:right;">0</td>';
                        }
                    } elseif ($currentDate->format('m') == '04') {
                        if ($data->apr_new != 0) {
                            echo '<td style="text-align:right;">'.number_format(($data->apr_new / $total_apr_new) * 100, 2, '.', ',').'</td>';
                        } else {
                            echo '<td style="text-align:right;">0</td>';
                        }
                    } elseif ($currentDate->format('m') == '05') {
                        if ($data->may_new != 0) {
                            echo '<td style="text-align:right;">'.number_format(($data->may_new / $total_may_new) * 100, 2, '.', ',').'</td>';
                        } else {
                            echo '<td style="text-align:right;">0</td>';
                        }
                    } elseif ($currentDate->format('m') == '06') {
                        if ($data->jun_new != 0) {
                            echo '<td style="text-align:right;">'.number_format(($data->jun_new / $total_jun_new) * 100, 2, '.', ',').'</td>';
                        } else {
                            echo '<td style="text-align:right;">0</td>';
                        }
                    } elseif ($currentDate->format('m') == '07') {
                        if ($data->jul_new != 0) {
                            echo '<td style="text-align:right;">'.number_format(($data->jul_new / $total_jul_new) * 100, 2, '.', ',').'</td>';
                        } else {
                            echo '<td style="text-align:right;">0</td>';
                        }
                    } elseif ($currentDate->format('m') == '08') {
                        if ($data->aug_new != 0) {
                            echo '<td style="text-align:right;">'.number_format(($data->aug_new / $total_aug_new) * 100, 2, '.', ',').'</td>';
                        } else {
                            echo '<td style="text-align:right;">0</td>';
                        }
                    } elseif ($currentDate->format('m') == '09') {
                        if ($data->sep_new != 0) {
                            echo '<td style="text-align:right;">'.number_format(($data->sep_new / $total_sep_new) * 100, 2, '.', ',').'</td>';
                        } else {
                            echo '<td style="text-align:right;">0</td>';
                        }
                    } elseif ($currentDate->format('m') == '10') {
                        if ($data->oct_new != 0) {
                            echo '<td style="text-align:right;">'.number_format(($data->oct_new / $total_oct_new) * 100, 2, '.', ',').'</td>';
                        } else {
                            echo '<td style="text-align:right;">0</td>';
                        }
                    } elseif ($currentDate->format('m') == '11') {
                        if ($data->nov_new != 0) {
                            echo '<td style="text-align:right;">'.number_format(($data->nov_new / $total_nov_new) * 100, 2, '.', ',').'</td>';
                        } else {
                            echo '<td style="text-align:right;">0</td>';
                        }
                    } elseif ($currentDate->format('m') == '12') {
                        if ($data->dec_new != 0) {
                            echo '<td style="text-align:right;">'.number_format(($data->dec_new / $total_dec_new) * 100, 2, '.', ',').'</td>';
                        } else {
                            echo '<td style="text-align:right;">0</td>';
                        }
                    }
                    ?>
            </tr>
            @endif
        @endforeach
    </table>
    <hr>
    <table border="1">
        <tr>
            <td>MONTH</td>
            <td>SMC</td>
            <td>RJB</td>
            <td>RPM</td>
            <td>NEW PRODUCT TOTAL</td>
        </tr>
        <tr>
            <td>JANUARY</td>
            <td style="text-align:right;">{{ number_format($totalsmc_jan, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrjb_jan, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrpm_jan, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{number_format($totalsmc_jan + $totalrjb_jan + $totalrpm_jan,2,'.',',')}}</td>
        </tr>
        <tr>
            <td>FEBRUARY</td>
            <td style="text-align:right;">{{ number_format($totalsmc_feb, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrjb_feb, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrpm_feb, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{number_format($totalsmc_feb + $totalrjb_feb + $totalrpm_feb,2,'.',',')}}</td>
        </tr>
        <tr>
            <td>MARCH</td>
            <td style="text-align:right;">{{ number_format($totalsmc_mar, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrjb_mar, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrpm_mar, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{number_format($totalsmc_mar + $totalrjb_mar + $totalrpm_mar,2,'.',',')}}</td>
        </tr>
        <tr>
            <td>APRIL</td>
            <td style="text-align:right;">{{ number_format($totalsmc_apr, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrjb_apr, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrpm_apr, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{number_format($totalsmc_apr + $totalrjb_apr + $totalrpm_apr,2,'.',',')}}</td>
        </tr>
        <tr>
            <td>MAY</td>
            <td style="text-align:right;">{{ number_format($totalsmc_may, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrjb_may, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrpm_may, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{number_format($totalsmc_may + $totalrjb_may + $totalrpm_may,2,'.',',')}}</td>
        </tr>
        <tr>
            <td>JUNE</td>
            <td style="text-align:right;">{{ number_format($totalsmc_jun, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrjb_jun, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrpm_jun, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{number_format($totalsmc_jun + $totalrjb_jun + $totalrpm_jun,2,'.',',')}}</td>
        </tr>
        <tr>
            <td>JULY</td>
            <td style="text-align:right;">{{ number_format($totalsmc_jul, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrjb_jul, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrpm_jul, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{number_format($totalsmc_jul + $totalrjb_jul + $totalrpm_jul,2,'.',',')}}</td>
        </tr>
        <tr>
            <td>AUGUST</td>
            <td style="text-align:right;">{{ number_format($totalsmc_aug, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrjb_aug, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrpm_aug, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{number_format($totalsmc_aug + $totalrjb_aug + $totalrpm_aug,2,'.',',')}}</td>
        </tr>
        <tr>
            <td>SEPTEMBER</td>
            <td style="text-align:right;">{{ number_format($totalsmc_sep, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrjb_sep, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrpm_sep, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{number_format($totalsmc_sep + $totalrjb_sep + $totalrpm_sep,2,'.',',')}}</td>
        </tr>
        <tr>
            <td>OCTOBER</td>
            <td style="text-align:right;">{{ number_format($totalsmc_oct, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrjb_oct, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrpm_oct, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{number_format($totalsmc_oct + $totalrjb_oct + $totalrpm_oct,2,'.',',')}}</td>
        </tr>
        <tr>
            <td>NOVEMBER</td>
            <td style="text-align:right;">{{ number_format($totalsmc_nov, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrjb_nov, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrpm_nov, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{number_format($totalsmc_nov + $totalrjb_nov + $totalrpm_nov,2,'.',',')}}</td>
        </tr>
        <tr>
            <td>DECEMBER</td>
            <td style="text-align:right;">{{ number_format($totalsmc_dec, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrjb_dec, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{ number_format($totalrpm_dec, 2, '.', ',') }}</td>
            <td style="text-align:right;">{{number_format($totalsmc_dec + $totalrjb_dec + $totalrpm_dec,2,'.',',')}}</td>
        </tr>

    </table>

</body>

</html>
