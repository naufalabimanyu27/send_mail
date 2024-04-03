<html>

<head>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <style>
        td {
            padding: 5px !important;
        }
    </style>
</head>
<body onload="exportToExcel()">
    <h3>LINK DOWNLOAD EXCEL : <a href="https://sendmailoracle.riyadi.co.id/smecv_net">https://sendmailoracle.riyadi.co.id/smecv_net</a></h3>
    <p>*Data on this link will only available for 1 week</p>
    <!-- START BRAND -->
    <table border="1" id="tabel1">
        <tr>
            <td>BRAND</td>
        @foreach ($loopperiode as $periode)
            <td>{{$periode}}</td>
        @endforeach
        <td>TOTAL</td>
        <?php
            $totalbrand1=0;
            $totalbrand2=0;
            $totalbrand3=0;
            $totalbrand4=0;
            $totalbrand5=0;
            $totalbrand6=0;
            $totalbrand7=0;
            $totalbrand8=0;
            $totalbrand9=0;
            $totalbrand10=0;
            $totalbrand11=0;
            $totalbrand12=0;
            $totalbrandall=0;
        ?>
        </tr>
        @foreach ($data_brand as $d)
            <tr>
                <td>{{$d->type}}</td>
                <td>
                    {{number_format($d->m12,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m11,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m10,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m9,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m8,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m7,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m6,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m5,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m4,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m3,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m2,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m1,2,'.',',')}}
                </td>
                <td>{{number_format($d->m1+
                    $d->m2+
                    $d->m3+
                    $d->m4+
                    $d->m5+
                    $d->m6+
                    $d->m7+
                    $d->m8+
                    $d->m9+
                    $d->m10+
                    $d->m11+
                    $d->m12,2,'.',',')}}</td>
                <?php 
                $totalbrand1=$totalbrand1 + $d->m1;
                $totalbrand2=$totalbrand2 + $d->m2;
                $totalbrand3=$totalbrand3 + $d->m3;
                $totalbrand4=$totalbrand4 + $d->m4;
                $totalbrand5=$totalbrand5 + $d->m5;
                $totalbrand6=$totalbrand6 + $d->m6;
                $totalbrand7=$totalbrand7 + $d->m7;
                $totalbrand8=$totalbrand8 + $d->m8;
                $totalbrand9=$totalbrand9 + $d->m9;
                $totalbrand10=$totalbrand10 + $d->m10;
                $totalbrand11=$totalbrand11 + $d->m11;
                $totalbrand12=$totalbrand12 + $d->m12;
                ?>
            </tr>
        @endforeach
        <tr>
            <td>ALL BRAND</td>
            <td>{{number_format($totalbrand12,2,'.',',')}}</td>
            <td>{{number_format($totalbrand11,2,'.',',')}}</td>
            <td>{{number_format($totalbrand10,2,'.',',')}}</td>
            <td>{{number_format($totalbrand9,2,'.',',')}}</td>
            <td>{{number_format($totalbrand8,2,'.',',')}}</td>
            <td>{{number_format($totalbrand7,2,'.',',')}}</td>
            <td>{{number_format($totalbrand6,2,'.',',')}}</td>
            <td>{{number_format($totalbrand5,2,'.',',')}}</td>
            <td>{{number_format($totalbrand4,2,'.',',')}}</td>
            <td>{{number_format($totalbrand3,2,'.',',')}}</td>
            <td>{{number_format($totalbrand2,2,'.',',')}}</td>
            <td>{{number_format($totalbrand1,2,'.',',')}}</td>
            <td>{{number_format($totalbrand12+
                $totalbrand11+
                $totalbrand10+
                $totalbrand9+
                $totalbrand8+
                $totalbrand7+
                $totalbrand6+
                $totalbrand5+
                $totalbrand4+
                $totalbrand3+
                $totalbrand2+
                $totalbrand1,2,'.',',')
                }}</td>
        </tr>
    </table>
    <!-- END BRAND -->
    <hr>
    <!-- START SALES -->
    <table border="1" id="tabel2">
        <tr>
            <td>SALES</td>
            @foreach ($loopperiode as $periode)
            <td>{{$periode}}</td>
            @endforeach
            <td>TOTAL</td>
            <?php
            $totalsales1=0;
            $totalsales2=0;
            $totalsales3=0;
            $totalsales4=0;
            $totalsales5=0;
            $totalsales6=0;
            $totalsales7=0;
            $totalsales8=0;
            $totalsales9=0;
            $totalsales10=0;
            $totalsales11=0;
            $totalsales12=0;
            $totalsalesall=0;
        ?>
        </tr>
        @foreach ($data_sales as $d)
            <tr>
                <td>{{$d->sales}}</td>
                <td>
                    {{number_format($d->m12,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m11,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m10,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m9,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m8,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m7,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m6,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m5,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m4,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m3,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m2,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m1,2,'.',',')}}
                </td>
                <td>{{number_format($d->m1+
                    $d->m2+
                    $d->m3+
                    $d->m4+
                    $d->m5+
                    $d->m6+
                    $d->m7+
                    $d->m8+
                    $d->m9+
                    $d->m10+
                    $d->m11+
                    $d->m12,2,'.',',')}}</td>
                <?php 
                $totalsales1=$totalsales1 + $d->m1;
                $totalsales2=$totalsales2 + $d->m2;
                $totalsales3=$totalsales3 + $d->m3;
                $totalsales4=$totalsales4 + $d->m4;
                $totalsales5=$totalsales5 + $d->m5;
                $totalsales6=$totalsales6 + $d->m6;
                $totalsales7=$totalsales7 + $d->m7;
                $totalsales8=$totalsales8 + $d->m8;
                $totalsales9=$totalsales9 + $d->m9;
                $totalsales10=$totalsales10 + $d->m10;
                $totalsales11=$totalsales11 + $d->m11;
                $totalsales12=$totalsales12 + $d->m12;
                ?>
            </tr>
        @endforeach
        <tr>
            <td>ALL SALES</td>
            <td>{{number_format($totalsales12,2,'.',',')}}</td>
            <td>{{number_format($totalsales11,2,'.',',')}}</td>
            <td>{{number_format($totalsales10,2,'.',',')}}</td>
            <td>{{number_format($totalsales9,2,'.',',')}}</td>
            <td>{{number_format($totalsales8,2,'.',',')}}</td>
            <td>{{number_format($totalsales7,2,'.',',')}}</td>
            <td>{{number_format($totalsales6,2,'.',',')}}</td>
            <td>{{number_format($totalsales5,2,'.',',')}}</td>
            <td>{{number_format($totalsales4,2,'.',',')}}</td>
            <td>{{number_format($totalsales3,2,'.',',')}}</td>
            <td>{{number_format($totalsales2,2,'.',',')}}</td>
            <td>{{number_format($totalsales1,2,'.',',')}}</td>
            <td>{{number_format($totalsales12+
                $totalsales11+
                $totalsales10+
                $totalsales9+
                $totalsales8+
                $totalsales7+
                $totalsales6+
                $totalsales5+
                $totalsales4+
                $totalsales3+
                $totalsales2+
                $totalsales1,2,'.',',')
                }}</td>
        </tr>
    </table>
    <!-- END SALES -->
    <hr>
    <!-- START CUSTOMER -->
    <table border="1" id="tabel3">
        <tr>
            <td>CUSTOMER</td>
            @foreach ($loopperiode as $periode)
            <td>{{$periode}}</td>
            @endforeach
            <td>TOTAL</td>
            <?php
            $totalcustomer1=0;
            $totalcustomer2=0;
            $totalcustomer3=0;
            $totalcustomer4=0;
            $totalcustomer5=0;
            $totalcustomer6=0;
            $totalcustomer7=0;
            $totalcustomer8=0;
            $totalcustomer9=0;
            $totalcustomer10=0;
            $totalcustomer11=0;
            $totalcustomer12=0;
            $totalcustomerall=0;
        ?>
        </tr>
        @foreach ($data_customer as $d)
            <tr>
                <td>{{$d->customer}}</td>
                <td>
                    {{number_format($d->m12,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m11,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m10,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m9,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m8,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m7,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m6,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m5,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m4,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m3,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m2,2,'.',',')}}
                </td>
                <td>
                    {{number_format($d->m1,2,'.',',')}}
                </td>
                <td>{{number_format($d->m1+
                    $d->m2+
                    $d->m3+
                    $d->m4+
                    $d->m5+
                    $d->m6+
                    $d->m7+
                    $d->m8+
                    $d->m9+
                    $d->m10+
                    $d->m11+
                    $d->m12,2,'.',',')}}</td>
                <?php 
                $totalcustomer1=$totalcustomer1 + $d->m1;
                $totalcustomer2=$totalcustomer2 + $d->m2;
                $totalcustomer3=$totalcustomer3 + $d->m3;
                $totalcustomer4=$totalcustomer4 + $d->m4;
                $totalcustomer5=$totalcustomer5 + $d->m5;
                $totalcustomer6=$totalcustomer6 + $d->m6;
                $totalcustomer7=$totalcustomer7 + $d->m7;
                $totalcustomer8=$totalcustomer8 + $d->m8;
                $totalcustomer9=$totalcustomer9 + $d->m9;
                $totalcustomer10=$totalcustomer10 + $d->m10;
                $totalcustomer11=$totalcustomer11 + $d->m11;
                $totalcustomer12=$totalcustomer12 + $d->m12;
                ?>
            </tr>
        @endforeach
        <tr>
            <td>ALL CUSTOMER</td>
            <td>{{number_format($totalcustomer12,2,'.',',')}}</td>
            <td>{{number_format($totalcustomer11,2,'.',',')}}</td>
            <td>{{number_format($totalcustomer10,2,'.',',')}}</td>
            <td>{{number_format($totalcustomer9,2,'.',',')}}</td>
            <td>{{number_format($totalcustomer8,2,'.',',')}}</td>
            <td>{{number_format($totalcustomer7,2,'.',',')}}</td>
            <td>{{number_format($totalcustomer6,2,'.',',')}}</td>
            <td>{{number_format($totalcustomer5,2,'.',',')}}</td>
            <td>{{number_format($totalcustomer4,2,'.',',')}}</td>
            <td>{{number_format($totalcustomer3,2,'.',',')}}</td>
            <td>{{number_format($totalcustomer2,2,'.',',')}}</td>
            <td>{{number_format($totalcustomer1,2,'.',',')}}</td>
            <td>{{number_format($totalcustomer12+
                $totalcustomer11+
                $totalcustomer10+
                $totalcustomer9+
                $totalcustomer8+
                $totalcustomer7+
                $totalcustomer6+
                $totalcustomer5+
                $totalcustomer4+
                $totalcustomer3+
                $totalcustomer2+
                $totalcustomer1,2,'.',',')
                }}</td>
        </tr>
    </table>
    <!-- END CUSTOMER -->

    <script lang="javascript" src="https://cdn.sheetjs.com/xlsx-0.20.0/package/dist/xlsx.full.min.js"></script>
    <script>
        function exportToExcel() {
            //Get HTML content of the tables
            var htmlTable1 = document.getElementById('tabel1').outerHTML;
            var htmlTable2 = document.getElementById('tabel2').outerHTML;
            var htmlTable3 = document.getElementById('tabel3').outerHTML;

            //Create a workbook
            var wb = XLSX.utils.book_new();

            //Convert HTML content to a worksheet
            var ws1 = XLSX.utils.table_to_sheet(document.getElementById('tabel1'));
            var ws2 = XLSX.utils.table_to_sheet(document.getElementById('tabel2'));
            var ws3 = XLSX.utils.table_to_sheet(document.getElementById('tabel3'));

            //Add worksheets to the workbook
            XLSX.utils.book_append_sheet(wb, ws1, 'PER BRAND');
            XLSX.utils.book_append_sheet(wb, ws2, 'PER SALES');
            XLSX.utils.book_append_sheet(wb, ws3, 'PER COSTUMER');

            //Save the workbook to a file
            XLSX.writeFile(wb, 'tables.xlsx');
        }
    </script>
</body>
</html>