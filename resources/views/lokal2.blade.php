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

<body onload="exportToExcel()">
    <table border="1" id="tabel1">
        <?php
            if(date('M') == 'Jan'){
            $year_now = date('Y') - 1;
            }
            else{
                $year_now = date('Y');
            }
            $year_old = $year_now - 1;
            $cum_jan_old = 0;	$cum_jan_new = 0;
            $cum_feb_old = 0;	$cum_feb_new = 0;
            $cum_mar_old = 0;	$cum_mar_new = 0;
            $cum_apr_old = 0;	$cum_apr_new = 0;
            $cum_may_old = 0;	$cum_may_new = 0;
            $cum_jun_old = 0;	$cum_jun_new = 0;
            $cum_jul_old = 0;	$cum_jul_new = 0;
            $cum_aug_old = 0;	$cum_aug_new = 0;
            $cum_sep_old = 0;	$cum_sep_new = 0;
            $cum_oct_old = 0;	$cum_oct_new = 0;
            $cum_nov_old = 0;	$cum_nov_new = 0;
            $cum_dec_old = 0;	$cum_dec_new = 0;
            $cum_total_old = 0;
            $cum_total_new = 0;
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
        @foreach ($data as $d)
        @if($d->total_old != 0 or $d->total_new != 0)
        <tr>
            <td>{{$d->erp}}</td>
            <td>{{$d->brand}}</td>
            <td>{{$d->total_old}}</td>
            <td>{{$d->total_new}}</td>
            <td>
                @if($d->total_old != 0)
                {{$d->total_new / $d->total_old - 1}}
                @else
                0
                @endif
            </td>
            <td>{{ $d->jan_old }}</td>	<td>{{ $d->jan_new }}</td>
            <td>{{ $d->feb_old }}</td>	<td>{{ $d->feb_new }}</td>
            <td>{{ $d->mar_old }}</td>	<td>{{ $d->mar_new }}</td>
            <td>{{ $d->apr_old }}</td>	<td>{{ $d->apr_new }}</td>
            <td>{{ $d->may_old }}</td>	<td>{{ $d->may_new }}</td>
            <td>{{ $d->jun_old }}</td>	<td>{{ $d->jun_new }}</td>
            <td>{{ $d->jul_old }}</td>	<td>{{ $d->jul_new }}</td>
            <td>{{ $d->aug_old }}</td>	<td>{{ $d->aug_new }}</td>
            <td>{{ $d->sep_old }}</td>	<td>{{ $d->sep_new }}</td>
            <td>{{ $d->oct_old }}</td>	<td>{{ $d->oct_new }}</td>
            <td>{{ $d->nov_old }}</td>	<td>{{ $d->nov_new }}</td>
            <td>{{ $d->dec_old }}</td>	<td>{{ $d->dec_new }}</td>
        </tr>
        <?php
        $cum_jan_old = $cum_jan_old + $d->jan_old;	$cum_jan_new = $cum_jan_new + $d->jan_new;
        $cum_feb_old = $cum_feb_old + $d->feb_old;	$cum_feb_new = $cum_feb_new + $d->feb_new;
        $cum_mar_old = $cum_mar_old + $d->mar_old;	$cum_mar_new = $cum_mar_new + $d->mar_new;
        $cum_apr_old = $cum_apr_old + $d->apr_old;	$cum_apr_new = $cum_apr_new + $d->apr_new;
        $cum_may_old = $cum_may_old + $d->may_old;	$cum_may_new = $cum_may_new + $d->may_new;
        $cum_jun_old = $cum_jun_old + $d->jun_old;	$cum_jun_new = $cum_jun_new + $d->jun_new;
        $cum_jul_old = $cum_jul_old + $d->jul_old;	$cum_jul_new = $cum_jul_new + $d->jul_new;
        $cum_aug_old = $cum_aug_old + $d->aug_old;	$cum_aug_new = $cum_aug_new + $d->aug_new;
        $cum_sep_old = $cum_sep_old + $d->sep_old;	$cum_sep_new = $cum_sep_new + $d->sep_new;
        $cum_oct_old = $cum_oct_old + $d->oct_old;	$cum_oct_new = $cum_oct_new + $d->oct_new;
        $cum_nov_old = $cum_nov_old + $d->nov_old;	$cum_nov_new = $cum_nov_new + $d->nov_new;
        $cum_dec_old = $cum_dec_old + $d->dec_old;	$cum_dec_new = $cum_dec_new + $d->dec_new;
        $cum_total_old = $cum_total_old + $d->total_old;
        $cum_total_new = $cum_total_new + $d->total_new;
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
        ?>
        @endif
        @endforeach
        <tr>
            <td colspan="2">CUMULATIVE</td>
            <td>{{$cum_total_old}}</td>
            <td>{{$cum_total_new}}</td>
            <td>
                @if ($cum_total_old != 0)
                    {{($cum_total_new/$cum_total_old)-1}}
                @else
                    0
                @endif
            </td>
            <td>{{$cum_jan_old}}</td>	<td>{{$cum_jan_new}}</td>
            <td>{{$cum_feb_old}}</td>	<td>{{$cum_feb_new}}</td>
            <td>{{$cum_mar_old}}</td>	<td>{{$cum_mar_new}}</td>
            <td>{{$cum_apr_old}}</td>	<td>{{$cum_apr_new}}</td>
            <td>{{$cum_may_old}}</td>	<td>{{$cum_may_new}}</td>
            <td>{{$cum_jun_old}}</td>	<td>{{$cum_jun_new}}</td>
            <td>{{$cum_jul_old}}</td>	<td>{{$cum_jul_new}}</td>
            <td>{{$cum_aug_old}}</td>	<td>{{$cum_aug_new}}</td>
            <td>{{$cum_sep_old}}</td>	<td>{{$cum_sep_new}}</td>
            <td>{{$cum_oct_old}}</td>	<td>{{$cum_oct_new}}</td>
            <td>{{$cum_nov_old}}</td>	<td>{{$cum_nov_new}}</td>
            <td>{{$cum_dec_old}}</td>	<td>{{$cum_dec_new}}</td>
        </tr>
    </table>
    <!-- PER BRAND -->
    <hr>
    <table border="1" id="tabel2">
        <?php
            $currentDate = new DateTime();
            $currentDate->modify('-1 month');
        ?>
        <tr>
            <td>BRAND</td>
            <td>
                <?php
                echo 'DATA ' . strtoupper($currentDate->format('F'));
                ?>
            </td>
            <td>% TERHADAP TOTAL <br>BULAN <?= strtoupper($currentDate->format('F')) ?></td>
        </tr>
        @foreach($data_brand as $d)
        @if ($currentDate->format('m') == '01' and $d->jan_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->jan_new}}</td>
            <td>
                @if ($cum_jan_new !=0)
                    {{$d->jan_new / $cum_jan_new}}
                @else
                    0
                @endif
            </td>
        </tr>
        @elseif($currentDate->format('m') == '02' and $d->feb_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->feb_new}}</td>
            <td>
                @if ($cum_feb_new !=0)
                    {{$d->feb_new / $cum_feb_new}}
                @else
                    0
                @endif
            </td>
        </tr>
        @elseif($currentDate->format('m') == '03' and $d->mar_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->mar_new}}</td>
            <td>
                @if ($cum_mar_new !=0)
                    {{$d->mar_new / $cum_mar_new}}
                @else
                    0
                @endif
            </td>
        </tr>
        @elseif($currentDate->format('m') == '04' and $d->apr_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->apr_new}}</td>
            <td>
                @if ($cum_apr_new !=0)
                    {{$d->apr_new / $cum_apr_new}}
                @else
                    0
                @endif
            </td>
        </tr>
        @elseif($currentDate->format('m') == '05' and $d->may_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->may_new}}</td>
            <td>
                @if ($cum_may_new !=0)
                    {{$d->may_new / $cum_may_new}}
                @else
                    0
                @endif
            </td>
        </tr>
        @elseif($currentDate->format('m') == '06' and $d->jun_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->jun_new}}</td>
            <td>
                @if ($cum_jun_new !=0)
                    {{$d->jun_new / $cum_jun_new}}
                @else
                    0
                @endif
            </td>
        </tr>
        @elseif($currentDate->format('m') == '07' and $d->jul_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->jul_new}}</td>
            <td>
                @if ($cum_jul_new !=0)
                    {{$d->jul_new / $cum_jul_new}}
                @else
                    0
                @endif
            </td>
        </tr>
        @elseif($currentDate->format('m') == '08' and $d->aug_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->aug_new}}</td>
            <td>
                @if ($cum_aug_new !=0)
                    {{$d->aug_new / $cum_aug_new}}
                @else
                    0
                @endif
            </td>
        </tr>
        @elseif($currentDate->format('m') == '09' and $d->sep_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->sep_new}}</td>
            <td>
                @if ($cum_sep_new !=0)
                    {{$d->sep_new / $cum_sep_new}}
                @else
                    0
                @endif
            </td>
        </tr>
        @elseif($currentDate->format('m') == '10' and $d->oct_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->oct_new}}</td>
            <td>
                @if ($cum_oct_new !=0)
                    {{$d->oct_new / $cum_oct_new}}
                @else
                    0
                @endif
            </td>
        </tr>
        @elseif($currentDate->format('m') == '11' and $d->nov_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->nov_new}}</td>
            <td>
                @if ($cum_nov_new !=0)
                    {{$d->nov_new / $cum_nov_new}}
                @else
                    0
                @endif
            </td>
        </tr>
        @elseif($currentDate->format('m') == '12' and $d->dec_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->dec_new}}</td>
            <td>
                @if ($cum_dec_new !=0)
                    {{$d->dec_new / $cum_dec_new}}
                @else
                    0
                @endif
            </td>
        </tr>
        @endif
        @endforeach
    </table>
    <!-- NEW BRAND -->
    <hr>
    <table border="1" id="tabel3">
        <tr>
            <td>{{$year_now}}</td>
            <td>SMC<br>(KOF + IKO + NAB + KKT + UNP + YUK)</td>
            <td>RJB<br>(NOR + RIV + OKE)</td>
            <td>RPM<br>(TOG + TON + BAR + NIG)</td>
            <td>NEW PRODUCT TOTAL</td>
        </tr>
        <tr>
            <td>JANUARY</td>
            <td>{{ $totalsmc_jan }}</td>
            <td>{{ $totalrjb_jan }}</td>
            <td>{{ $totalrpm_jan }}</td>
            <td>
                {{ $totalsmc_jan + $totalrjb_jan + $totalrpm_jan }}</td>
        </tr>
        <tr>
            <td>FEBRUARY</td>
            <td>{{ $totalsmc_feb }}</td>
            <td>{{ $totalrjb_feb }}</td>
            <td>{{ $totalrpm_feb }}</td>
            <td>
                {{ $totalsmc_feb + $totalrjb_feb + $totalrpm_feb }}</td>
        </tr>
        <tr>
            <td>MARCH</td>
            <td>{{ $totalsmc_mar }}</td>
            <td>{{ $totalrjb_mar }}</td>
            <td>{{ $totalrpm_mar }}</td>
            <td>
                {{ $totalsmc_mar + $totalrjb_mar + $totalrpm_mar }}</td>
        </tr>
        <tr>
            <td>APRIL</td>
            <td>{{ $totalsmc_apr }}</td>
            <td>{{ $totalrjb_apr }}</td>
            <td>{{ $totalrpm_apr }}</td>
            <td>
                {{ $totalsmc_apr + $totalrjb_apr + $totalrpm_apr }}</td>
        </tr>
        <tr>
            <td>MAY</td>
            <td>{{ $totalsmc_may }}</td>
            <td>{{ $totalrjb_may }}</td>
            <td>{{ $totalrpm_may }}</td>
            <td>
                {{ $totalsmc_may + $totalrjb_may + $totalrpm_may }}</td>
        </tr>
        <tr>
            <td>JUNE</td>
            <td>{{ $totalsmc_jun }}</td>
            <td>{{ $totalrjb_jun }}</td>
            <td>{{ $totalrpm_jun }}</td>
            <td>
                {{ $totalsmc_jun + $totalrjb_jun + $totalrpm_jun }}</td>
        </tr>
        <tr>
            <td>JULY</td>
            <td>{{ $totalsmc_jul }}</td>
            <td>{{ $totalrjb_jul }}</td>
            <td>{{ $totalrpm_jul }}</td>
            <td>
                {{ $totalsmc_jul + $totalrjb_jul + $totalrpm_jul }}</td>
        </tr>
        <tr>
            <td>AUGUST</td>
            <td>{{ $totalsmc_aug }}</td>
            <td>{{ $totalrjb_aug }}</td>
            <td>{{ $totalrpm_aug }}</td>
            <td>
                {{ $totalsmc_aug + $totalrjb_aug + $totalrpm_aug }}</td>
        </tr>
        <tr>
            <td>SEPTEMBER</td>
            <td>{{ $totalsmc_sep }}</td>
            <td>{{ $totalrjb_sep }}</td>
            <td>{{ $totalrpm_sep }}</td>
            <td>
                {{ $totalsmc_sep + $totalrjb_sep + $totalrpm_sep }}</td>
        </tr>
        <tr>
            <td>OCTOBER</td>
            <td>{{ $totalsmc_oct }}</td>
            <td>{{ $totalrjb_oct }}</td>
            <td>{{ $totalrpm_oct }}</td>
            <td>
                {{ $totalsmc_oct + $totalrjb_oct + $totalrpm_oct }}</td>
        </tr>
        <tr>
            <td>NOVEMBER</td>
            <td>{{ $totalsmc_nov }}</td>
            <td>{{ $totalrjb_nov }}</td>
            <td>{{ $totalrpm_nov }}</td>
            <td>
                {{ $totalsmc_nov + $totalrjb_nov + $totalrpm_nov }}</td>
        </tr>
        <tr>
            <td>DECEMBER</td>
            <td>{{ $totalsmc_dec }}</td>
            <td>{{ $totalrjb_dec }}</td>
            <td>{{ $totalrpm_dec }}</td>
            <td>
                {{ $totalsmc_dec + $totalrjb_dec + $totalrpm_dec }}</td>
        </tr>
    </table>
    <!-- PER BRAND BY SYSTEM -->
    <hr>
    <table border="1" id="tabel4">
        <tr>
            <td>BRAND</td>
            <td>SMCB</td>
            <td>SEIB</td>
            <td>SEIT</td>
            <td>RJB</td>
            <td>RPM</td>
            <td>RWI</td>
            <td>TOTAL <?= $year_now ?></td>
            <td>TOTAL <?= $year_old ?></td>
            <td>
                % CHANGE
            </td>
        </tr>
        @foreach ($data_brand_persystem as $data)
        @if($data->total_new != 0)
        <tr>
            <td>{{$data->brand}}</td>
            <td>{{$data->smcb}}</td>
            <td>{{$data->seib}}</td>
            <td>{{$data->seit}}</td>
            <td>{{$data->rjb}}</td>
            <td>{{$data->rpm}}</td>
            <td>{{$data->rwi}}</td>
            <td>{{$data->total_new}}</td>
            <td>{{$data->total_old}}</td>
            <td>
                @if ($data->total_old != 0)
                {{($data->total_new / $data->total_old) - 1}}
                @else
                0
                @endif
            </td>
        </tr>
        @endif
        @endforeach
    </table>
    <!-- PER SYSTEM -->
    <hr>
    <table border="1" id="tabel5">
        <tr>
            <td>SYSTEM</td>
            <td>TOTAL {{$year_now}}</td>
            <td>% TERHADAP TOTAL KUMULATIF</td>
            @for($i=1;$i<=12;$i++)
            <td>{{strtoupper(date('F', mktime(0, 0, 0, $i, 1)))}}</td>
            @endfor
        </tr>
        @foreach ($data_system as $d)
        <tr>
            <td>{{$d->erp}}</td>
            <td>{{$d->total_new}}</td>
            <td>
                @if ($cum_total_new != 0)
                    {{($d->total_new / $cum_total_new)}}
                @else
                    0
                @endif
            </td>
            <td>{{ $d->jan_new }}</td>
            <td>{{ $d->feb_new }}</td>
            <td>{{ $d->mar_new }}</td>
            <td>{{ $d->apr_new }}</td>
            <td>{{ $d->may_new }}</td>
            <td>{{ $d->jun_new }}</td>
            <td>{{ $d->jul_new }}</td>
            <td>{{ $d->aug_new }}</td>
            <td>{{ $d->sep_new }}</td>
            <td>{{ $d->oct_new }}</td>
            <td>{{ $d->nov_new }}</td>
            <td>{{ $d->dec_new }}</td>
        </tr>
        @endforeach
    </table>
    
    <!-- table to excel javascript -->
    <script lang="javascript" src="https://cdn.sheetjs.com/xlsx-0.20.0/package/dist/xlsx.full.min.js"></script>
    <script>
        function exportToExcel() {
            //Get HTML content of the tables
            var htmlTable1 = document.getElementById('tabel1').outerHTML;
            var htmlTable2 = document.getElementById('tabel2').outerHTML;
            var htmlTable3 = document.getElementById('tabel3').outerHTML;
            var htmlTable4 = document.getElementById('tabel4').outerHTML;
            var htmlTable5 = document.getElementById('tabel5').outerHTML;

            //Create a workbook
            var wb = XLSX.utils.book_new();

            //Convert HTML content to a worksheet
            var ws1 = XLSX.utils.table_to_sheet(document.getElementById('tabel1'));
            var ws2 = XLSX.utils.table_to_sheet(document.getElementById('tabel2'));
            var ws3 = XLSX.utils.table_to_sheet(document.getElementById('tabel3'));
            var ws4 = XLSX.utils.table_to_sheet(document.getElementById('tabel4'));
            var ws5 = XLSX.utils.table_to_sheet(document.getElementById('tabel5'));

            //Add worksheets to the workbook
            XLSX.utils.book_append_sheet(wb, ws1, 'ALL DATA');
            XLSX.utils.book_append_sheet(wb, ws2, '<?= 'PER BRAND ' . date('Ym') ?>');
            XLSX.utils.book_append_sheet(wb, ws3, 'NEW PRODUCT');
            XLSX.utils.book_append_sheet(wb, ws4, '<?= 'PER BRAND CUM' . date('Y') ?>');
            XLSX.utils.book_append_sheet(wb, ws5, 'PER SYSTEM <?= date('Y') ?>');

            //Save the workbook to a file
            XLSX.writeFile(wb, 'tables.xlsx');
        }
    </script>
</body>

</html>
