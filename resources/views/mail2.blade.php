<html>

<head>
    <style>
        td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <table border="1">
        <tr>
            <td>SYSTEM</td>
            <td>BRAND</td>
            <td>TOTAL <?=date('Y')?></td>
            <?php
            for($i=1;$i<=12;$i++){
            ?>
            <td><?php
            $monthName = date('F', mktime(0, 0, 0, $i, 1));
            echo $monthName;
            ?></td>
            <?php } ?>
        </tr>
        <?php
        $total_this_year_all = 0;
        $total_jan = 0;
        $total_feb = 0;
        $total_mar = 0;
        $total_apr = 0;
        $total_may = 0;
        $total_jun = 0;
        $total_jul = 0;
        $total_aug = 0;
        $total_sep = 0;
        $total_oct = 0;
        $total_nov = 0;
        $total_dec = 0;
        ?>
        <!-- START SMCB -->
        <?php
        $i = 0;
        foreach ($ptsmcb as $d) {
            $i++;
        }
        ?>
        <?php $x = 0; ?>
        @foreach ($ptsmcb as $d)
            <tr style="background-color: lightgrey;">
                <?php
            if ($x == 0) {
            ?>
                <td rowspan="{{ $i }}">{{ $d->erp }}</td>
                <?php
                $x++;
            }
            ?>
                <td>{{ $d->brand }}</td>
                <?php
                    $totaltahunini = $d->jan + $d->feb + $d->mar + $d->apr + $d->may + $d->jun + $d->jul + $d->aug + $d->sep + $d->oct + $d->nov + $d->dec;
                    ?>
                    <td>{{number_format($totaltahunini, 2, '.', ',')}}</td>
                    <?php
                    $total_this_year_all = $total_this_year_all + $totaltahunini;
                    $total_jan = $total_jan + $d->jan;
                    $total_feb = $total_feb + $d->feb;
                    $total_mar = $total_mar + $d->mar;
                    $total_apr = $total_apr + $d->apr;
                    $total_may = $total_may + $d->may;
                    $total_jun = $total_jun + $d->jun;
                    $total_jul = $total_jul + $d->jul;
                    $total_aug = $total_aug + $d->aug;
                    $total_sep = $total_sep + $d->sep;
                    $total_oct = $total_oct + $d->oct;
                    $total_nov = $total_nov + $d->nov;
                    $total_dec = $total_dec + $d->dec;
                    ?>
                <td style="color: @if ($d->jan > 0) green; @else red; @endif">
                    {{ number_format($d->jan, 2, '.', ',') }}</td>
                <td style="color: @if ($d->feb > 0) green; @else red; @endif">
                    {{ number_format($d->feb, 2, '.', ',') }}</td>
                <td style="color: @if ($d->mar > 0) green; @else red; @endif">
                    {{ number_format($d->mar, 2, '.', ',') }}</td>
                <td style="color: @if ($d->apr > 0) green; @else red; @endif">
                    {{ number_format($d->apr, 2, '.', ',') }}</td>
                <td style="color: @if ($d->may > 0) green; @else red; @endif">
                    {{ number_format($d->may, 2, '.', ',') }}</td>
                <td style="color: @if ($d->jun > 0) green; @else red; @endif">
                    {{ number_format($d->jun, 2, '.', ',') }}</td>
                <td style="color: @if ($d->jul > 0) green; @else red; @endif">
                    {{ number_format($d->jul, 2, '.', ',') }}</td>
                <td style="color: @if ($d->aug > 0) green; @else red; @endif">
                    {{ number_format($d->aug, 2, '.', ',') }}</td>
                <td style="color: @if ($d->sep > 0) green; @else red; @endif">
                    {{ number_format($d->sep, 2, '.', ',') }}</td>
                <td style="color: @if ($d->oct > 0) green; @else red; @endif">
                    {{ number_format($d->oct, 2, '.', ',') }}</td>
                <td style="color: @if ($d->nov > 0) green; @else red; @endif">
                    {{ number_format($d->nov, 2, '.', ',') }}</td>
                <td style="color: @if ($d->dec > 0) green; @else red; @endif">
                    {{ number_format($d->dec, 2, '.', ',') }}</td>
            </tr>
        @endforeach
        <!-- END SMCB -->
        <!-- START SEIB -->
        <?php
        $i = 0;
        foreach ($ptseib as $d) {
            $i++;
        }
        ?>
        <?php $x = 0; ?>
        @foreach ($ptseib as $d)
            <tr style="background-color: bisque;">
                <?php
            if ($x == 0) {
            ?>
                <td rowspan="{{ $i }}">{{ $d->erp }}</td>
                <?php
                $x++;
            }
            ?>
                <td>{{ $d->brand }}</td>
                <?php
                    $totaltahunini = $d->jan + $d->feb + $d->mar + $d->apr + $d->may + $d->jun + $d->jul + $d->aug + $d->sep + $d->oct + $d->nov + $d->dec;
                    ?>
                    <td>{{number_format($totaltahunini, 2, '.', ',')}}</td>
                    <?php
                    $total_this_year_all = $total_this_year_all + $totaltahunini;
                    $total_jan = $total_jan + $d->jan;
                    $total_feb = $total_feb + $d->feb;
                    $total_mar = $total_mar + $d->mar;
                    $total_apr = $total_apr + $d->apr;
                    $total_may = $total_may + $d->may;
                    $total_jun = $total_jun + $d->jun;
                    $total_jul = $total_jul + $d->jul;
                    $total_aug = $total_aug + $d->aug;
                    $total_sep = $total_sep + $d->sep;
                    $total_oct = $total_oct + $d->oct;
                    $total_nov = $total_nov + $d->nov;
                    $total_dec = $total_dec + $d->dec;
                    ?>
                <td style="color: @if ($d->jan > 0) green; @else red; @endif">
                    {{ number_format($d->jan, 2, '.', ',') }}</td>
                <td style="color: @if ($d->feb > 0) green; @else red; @endif">
                    {{ number_format($d->feb, 2, '.', ',') }}</td>
                <td style="color: @if ($d->mar > 0) green; @else red; @endif">
                    {{ number_format($d->mar, 2, '.', ',') }}</td>
                <td style="color: @if ($d->apr > 0) green; @else red; @endif">
                    {{ number_format($d->apr, 2, '.', ',') }}</td>
                <td style="color: @if ($d->may > 0) green; @else red; @endif">
                    {{ number_format($d->may, 2, '.', ',') }}</td>
                <td style="color: @if ($d->jun > 0) green; @else red; @endif">
                    {{ number_format($d->jun, 2, '.', ',') }}</td>
                <td style="color: @if ($d->jul > 0) green; @else red; @endif">
                    {{ number_format($d->jul, 2, '.', ',') }}</td>
                <td style="color: @if ($d->aug > 0) green; @else red; @endif">
                    {{ number_format($d->aug, 2, '.', ',') }}</td>
                <td style="color: @if ($d->sep > 0) green; @else red; @endif">
                    {{ number_format($d->sep, 2, '.', ',') }}</td>
                <td style="color: @if ($d->oct > 0) green; @else red; @endif">
                    {{ number_format($d->oct, 2, '.', ',') }}</td>
                <td style="color: @if ($d->nov > 0) green; @else red; @endif">
                    {{ number_format($d->nov, 2, '.', ',') }}</td>
                <td style="color: @if ($d->dec > 0) green; @else red; @endif">
                    {{ number_format($d->dec, 2, '.', ',') }}</td>
            </tr>
        @endforeach
        <!-- END SEIB -->
        <!-- START SEIT -->
        <?php
        $i = 0;
        foreach ($ptseit as $d) {
            $i++;
        }
        ?>
        <?php $x = 0; ?>
        @foreach ($ptseit as $d)
            <tr style="background-color: lightgrey;">
                <?php
            if ($x == 0) {
            ?>
                <td rowspan="{{ $i }}">{{ $d->erp }}</td>
                <?php
                $x++;
            }
            ?>
                <td>{{ $d->brand }}</td>
                <?php
                    $totaltahunini = $d->jan + $d->feb + $d->mar + $d->apr + $d->may + $d->jun + $d->jul + $d->aug + $d->sep + $d->oct + $d->nov + $d->dec;
                    ?>
                    <td>{{number_format($totaltahunini, 2, '.', ',')}}</td>
                    <?php
                    $total_this_year_all = $total_this_year_all + $totaltahunini;
                    $total_jan = $total_jan + $d->jan;
                    $total_feb = $total_feb + $d->feb;
                    $total_mar = $total_mar + $d->mar;
                    $total_apr = $total_apr + $d->apr;
                    $total_may = $total_may + $d->may;
                    $total_jun = $total_jun + $d->jun;
                    $total_jul = $total_jul + $d->jul;
                    $total_aug = $total_aug + $d->aug;
                    $total_sep = $total_sep + $d->sep;
                    $total_oct = $total_oct + $d->oct;
                    $total_nov = $total_nov + $d->nov;
                    $total_dec = $total_dec + $d->dec;
                    ?>
                <td style="color: @if ($d->jan > 0) green; @else red; @endif">
                    {{ number_format($d->jan, 2, '.', ',') }}</td>
                <td style="color: @if ($d->feb > 0) green; @else red; @endif">
                    {{ number_format($d->feb, 2, '.', ',') }}</td>
                <td style="color: @if ($d->mar > 0) green; @else red; @endif">
                    {{ number_format($d->mar, 2, '.', ',') }}</td>
                <td style="color: @if ($d->apr > 0) green; @else red; @endif">
                    {{ number_format($d->apr, 2, '.', ',') }}</td>
                <td style="color: @if ($d->may > 0) green; @else red; @endif">
                    {{ number_format($d->may, 2, '.', ',') }}</td>
                <td style="color: @if ($d->jun > 0) green; @else red; @endif">
                    {{ number_format($d->jun, 2, '.', ',') }}</td>
                <td style="color: @if ($d->jul > 0) green; @else red; @endif">
                    {{ number_format($d->jul, 2, '.', ',') }}</td>
                <td style="color: @if ($d->aug > 0) green; @else red; @endif">
                    {{ number_format($d->aug, 2, '.', ',') }}</td>
                <td style="color: @if ($d->sep > 0) green; @else red; @endif">
                    {{ number_format($d->sep, 2, '.', ',') }}</td>
                <td style="color: @if ($d->oct > 0) green; @else red; @endif">
                    {{ number_format($d->oct, 2, '.', ',') }}</td>
                <td style="color: @if ($d->nov > 0) green; @else red; @endif">
                    {{ number_format($d->nov, 2, '.', ',') }}</td>
                <td style="color: @if ($d->dec > 0) green; @else red; @endif">
                    {{ number_format($d->dec, 2, '.', ',') }}</td>
            </tr>
        @endforeach
        <!-- END SEIT -->
        <!-- START RJB -->
        <?php
        $i = 0;
        foreach ($ptrjb as $d) {
            $i++;
        }
        ?>
        <?php $x = 0; ?>
        @foreach ($ptrjb as $d)
            <tr style="background-color: bisque;">
                <?php
            if ($x == 0) {
            ?>
                <td rowspan="{{ $i }}">{{ $d->erp }}</td>
                <?php
                $x++;
            }
            ?>
                <td>{{ $d->brand }}</td>
                    <?php
                    $totaltahunini = $d->jan + $d->feb + $d->mar + $d->apr + $d->may + $d->jun + $d->jul + $d->aug + $d->sep + $d->oct + $d->nov + $d->dec;
                    ?>
                    <td>{{number_format($totaltahunini, 2, '.', ',')}}</td>
                    <?php
                    $total_this_year_all = $total_this_year_all + $totaltahunini;
                    $total_jan = $total_jan + $d->jan;
                    $total_feb = $total_feb + $d->feb;
                    $total_mar = $total_mar + $d->mar;
                    $total_apr = $total_apr + $d->apr;
                    $total_may = $total_may + $d->may;
                    $total_jun = $total_jun + $d->jun;
                    $total_jul = $total_jul + $d->jul;
                    $total_aug = $total_aug + $d->aug;
                    $total_sep = $total_sep + $d->sep;
                    $total_oct = $total_oct + $d->oct;
                    $total_nov = $total_nov + $d->nov;
                    $total_dec = $total_dec + $d->dec;
                    ?>
                <td style="color: @if ($d->jan > 0) green; @else red; @endif">
                    {{ number_format($d->jan, 2, '.', ',') }}</td>
                <td style="color: @if ($d->feb > 0) green; @else red; @endif">
                    {{ number_format($d->feb, 2, '.', ',') }}</td>
                <td style="color: @if ($d->mar > 0) green; @else red; @endif">
                    {{ number_format($d->mar, 2, '.', ',') }}</td>
                <td style="color: @if ($d->apr > 0) green; @else red; @endif">
                    {{ number_format($d->apr, 2, '.', ',') }}</td>
                <td style="color: @if ($d->may > 0) green; @else red; @endif">
                    {{ number_format($d->may, 2, '.', ',') }}</td>
                <td style="color: @if ($d->jun > 0) green; @else red; @endif">
                    {{ number_format($d->jun, 2, '.', ',') }}</td>
                <td style="color: @if ($d->jul > 0) green; @else red; @endif">
                    {{ number_format($d->jul, 2, '.', ',') }}</td>
                <td style="color: @if ($d->aug > 0) green; @else red; @endif">
                    {{ number_format($d->aug, 2, '.', ',') }}</td>
                <td style="color: @if ($d->sep > 0) green; @else red; @endif">
                    {{ number_format($d->sep, 2, '.', ',') }}</td>
                <td style="color: @if ($d->oct > 0) green; @else red; @endif">
                    {{ number_format($d->oct, 2, '.', ',') }}</td>
                <td style="color: @if ($d->nov > 0) green; @else red; @endif">
                    {{ number_format($d->nov, 2, '.', ',') }}</td>
                <td style="color: @if ($d->dec > 0) green; @else red; @endif">
                    {{ number_format($d->dec, 2, '.', ',') }}</td>
            </tr>
        @endforeach
        <!-- END RJB -->
        <!-- START RPM -->
        <?php
        $i = 0;
        foreach ($ptrpm as $d) {
            $i++;
        }
        ?>
        <?php $x = 0; ?>
        @foreach ($ptrpm as $d)
            <tr style="background-color: lightgrey;">
                <?php
            if ($x == 0) {
            ?>
                <td rowspan="{{ $i }}">{{ $d->erp }}</td>
                <?php
                $x++;
            }
            ?>
                <td>{{ $d->brand }}</td>
                <?php
                    $totaltahunini = $d->jan + $d->feb + $d->mar + $d->apr + $d->may + $d->jun + $d->jul + $d->aug + $d->sep + $d->oct + $d->nov + $d->dec;
                    ?>
                    <td>{{number_format($totaltahunini, 2, '.', ',')}}</td>
                    <?php
                    $total_this_year_all = $total_this_year_all + $totaltahunini;
                    $total_jan = $total_jan + $d->jan;
                    $total_feb = $total_feb + $d->feb;
                    $total_mar = $total_mar + $d->mar;
                    $total_apr = $total_apr + $d->apr;
                    $total_may = $total_may + $d->may;
                    $total_jun = $total_jun + $d->jun;
                    $total_jul = $total_jul + $d->jul;
                    $total_aug = $total_aug + $d->aug;
                    $total_sep = $total_sep + $d->sep;
                    $total_oct = $total_oct + $d->oct;
                    $total_nov = $total_nov + $d->nov;
                    $total_dec = $total_dec + $d->dec;
                    ?>
                <td style="color: @if ($d->jan > 0) green; @else red; @endif">
                    {{ number_format($d->jan, 2, '.', ',') }}</td>
                <td style="color: @if ($d->feb > 0) green; @else red; @endif">
                    {{ number_format($d->feb, 2, '.', ',') }}</td>
                <td style="color: @if ($d->mar > 0) green; @else red; @endif">
                    {{ number_format($d->mar, 2, '.', ',') }}</td>
                <td style="color: @if ($d->apr > 0) green; @else red; @endif">
                    {{ number_format($d->apr, 2, '.', ',') }}</td>
                <td style="color: @if ($d->may > 0) green; @else red; @endif">
                    {{ number_format($d->may, 2, '.', ',') }}</td>
                <td style="color: @if ($d->jun > 0) green; @else red; @endif">
                    {{ number_format($d->jun, 2, '.', ',') }}</td>
                <td style="color: @if ($d->jul > 0) green; @else red; @endif">
                    {{ number_format($d->jul, 2, '.', ',') }}</td>
                <td style="color: @if ($d->aug > 0) green; @else red; @endif">
                    {{ number_format($d->aug, 2, '.', ',') }}</td>
                <td style="color: @if ($d->sep > 0) green; @else red; @endif">
                    {{ number_format($d->sep, 2, '.', ',') }}</td>
                <td style="color: @if ($d->oct > 0) green; @else red; @endif">
                    {{ number_format($d->oct, 2, '.', ',') }}</td>
                <td style="color: @if ($d->nov > 0) green; @else red; @endif">
                    {{ number_format($d->nov, 2, '.', ',') }}</td>
                <td style="color: @if ($d->dec > 0) green; @else red; @endif">
                    {{ number_format($d->dec, 2, '.', ',') }}</td>
            </tr>
        @endforeach
        <!-- END RPM -->
        <!-- START Kumulatif tahun ini -->
        <tr>
            
            <td colspan="2">Total Cumulatif <?=date('Y')?></td>
            <td>{{ number_format($total_this_year_all, 2, '.', ',') }}</td>
            <td>{{ number_format($total_jan, 2, '.', ',') }}</td>
            <td>{{ number_format($total_feb, 2, '.', ',') }}</td>
            <td>{{ number_format($total_mar, 2, '.', ',') }}</td>
            <td>{{ number_format($total_apr, 2, '.', ',') }}</td>
            <td>{{ number_format($total_may, 2, '.', ',') }}</td>
            <td>{{ number_format($total_jun, 2, '.', ',') }}</td>
            <td>{{ number_format($total_jul, 2, '.', ',') }}</td>
            <td>{{ number_format($total_aug, 2, '.', ',') }}</td>
            <td>{{ number_format($total_sep, 2, '.', ',') }}</td>
            <td>{{ number_format($total_oct, 2, '.', ',') }}</td>
            <td>{{ number_format($total_nov, 2, '.', ',') }}</td>
            <td>{{ number_format($total_dec, 2, '.', ',') }}</td>
        </tr>
        <!-- END Kumulatif tahun ini -->
        
    </table>
</body>

</html>
