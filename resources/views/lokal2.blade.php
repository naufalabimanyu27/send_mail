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
        @endif
        @endforeach
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
            <td>{{$d->brand}}</td>
        </tr>
        @elseif($currentDate->format('m') == '02' and $d->feb_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->feb_new}}</td>
            <td>{{$d->brand}}</td>
        </tr>
        @elseif($currentDate->format('m') == '03' and $d->mar_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->mar_new}}</td>
            <td>{{$d->brand}}</td>
        </tr>
        @elseif($currentDate->format('m') == '04' and $d->apr_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->apr_new}}</td>
            <td>{{$d->brand}}</td>
        </tr>
        @elseif($currentDate->format('m') == '05' and $d->may_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->may_new}}</td>
            <td>{{$d->brand}}</td>
        </tr>
        @elseif($currentDate->format('m') == '06' and $d->jun_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->jun_new}}</td>
            <td>{{$d->brand}}</td>
        </tr>
        @elseif($currentDate->format('m') == '07' and $d->jul_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->jul_new}}</td>
            <td>{{$d->brand}}</td>
        </tr>
        @elseif($currentDate->format('m') == '08' and $d->aug_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->aug_new}}</td>
            <td>{{$d->brand}}</td>
        </tr>
        @elseif($currentDate->format('m') == '09' and $d->sep_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->sep_new}}</td>
            <td>{{$d->brand}}</td>
        </tr>
        @elseif($currentDate->format('m') == '10' and $d->oct_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->oct_new}}</td>
            <td>{{$d->brand}}</td>
        </tr>
        @elseif($currentDate->format('m') == '11' and $d->nov_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->nov_new}}</td>
            <td>{{$d->brand}}</td>
        </tr>
        @elseif($currentDate->format('m') == '12' and $d->dec_new != 0)
        <tr>
            <td>{{$d->brand}}</td>
            <td>{{$d->dec_new}}</td>
            <td>{{$d->brand}}</td>
        </tr>
        @endif
        @endforeach
    </table>
    
    <!-- table to excel javascript -->
    <script lang="javascript" src="https://cdn.sheetjs.com/xlsx-0.20.0/package/dist/xlsx.full.min.js"></script>
    <script>
        function exportToExcel() {
            //Get HTML content of the tables
            // var htmlTable1 = document.getElementById('tabel1').outerHTML;
            // var htmlTable2 = document.getElementById('tabel2').outerHTML;
            // var htmlTable3 = document.getElementById('tabel3').outerHTML;
            // var htmlTable4 = document.getElementById('tabel4').outerHTML;
            // var htmlTable5 = document.getElementById('tabel5').outerHTML;

            //Create a workbook
            // var wb = XLSX.utils.book_new();

            //Convert HTML content to a worksheet
            // var ws1 = XLSX.utils.table_to_sheet(document.getElementById('tabel1'));
            // var ws2 = XLSX.utils.table_to_sheet(document.getElementById('tabel2'));
            // var ws3 = XLSX.utils.table_to_sheet(document.getElementById('tabel3'));
            // var ws4 = XLSX.utils.table_to_sheet(document.getElementById('tabel4'));
            // var ws5 = XLSX.utils.table_to_sheet(document.getElementById('tabel5'));

            //Add worksheets to the workbook
            // XLSX.utils.book_append_sheet(wb, ws1, 'ALL DATA');
            // XLSX.utils.book_append_sheet(wb, ws2, '<?= 'PER BRAND ' . date('Ym') ?>');
            // XLSX.utils.book_append_sheet(wb, ws3, 'NEW PRODUCT');
            // XLSX.utils.book_append_sheet(wb, ws4, '<?= 'PER BRAND CUM' . date('Y') ?>');
            // XLSX.utils.book_append_sheet(wb, ws5, 'PER SYSTEM <?= date('Y') ?>');

            //Save the workbook to a file
            // XLSX.writeFile(wb, 'tables.xlsx');
        }
    </script>
</body>

</html>
