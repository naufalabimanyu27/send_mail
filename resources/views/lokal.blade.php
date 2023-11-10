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
        $year_now = date('Y');
        $year_old = $year_now - 1;
        ?>
        <tr>
            <td rowspan="2">SYSTEM</td>
            <td rowspan="2">BRAND</td>
            <td rowspan="2">TOTAL {{ $year_old }}</td>
            <td rowspan="2">TOTAL {{ $year_now }}</td>
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
        ?>
        <!-- START SMCB -->
        <?php
        $i = 0;
        foreach ($ptsmcb as $d) {
            if($d->total_old != 0 or $d->total_new != 0){
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
                <td>
                    <?php
                    $total_year_old = $total_year_old + $d->total_old;
                    echo number_format($d->total_old, 2, '.', ',');
                    ?>
                </td>
                <td>
                    <?php
                    $total_year_new = $total_year_new + $d->total_new;
                    echo number_format($d->total_new, 2, '.', ',');
                    ?>
                </td>
                <td>
                    <?=($d->total_old != 0)? number_format($d->total_new/$d->total_old*100, 2, '.', ',') : 0 ?>
            </td>
                <td>{{ number_format($d->jan_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jan_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->feb_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->feb_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->mar_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->mar_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->apr_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->apr_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->may_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->may_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jun_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jun_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jul_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jul_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->aug_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->aug_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->sep_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->sep_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->oct_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->oct_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->nov_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->nov_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->dec_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->dec_new, 2, '.', ',') }}</td>
            </tr>
            <?php } ?>
        @endforeach
        <!-- END SMCB -->
        <!-- START SEIB -->
        <?php
        $i = 0;
        foreach ($ptseib as $d) {
            if($d->total_old != 0 or $d->total_new != 0){
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
                <td>
                    <?php
                    $total_year_old = $total_year_old + $d->total_old;
                    echo number_format($d->total_old, 2, '.', ',');
                    ?>
                </td>
                <td>
                    <?php
                    $total_year_new = $total_year_new + $d->total_new;
                    echo number_format($d->total_new, 2, '.', ',');
                    ?>
                </td>
                <td>
                    <?=($d->total_old != 0)? number_format($d->total_new/$d->total_old*100, 2, '.', ',') : 0 ?>
            </td>
                <td>{{ number_format($d->jan_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jan_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->feb_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->feb_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->mar_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->mar_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->apr_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->apr_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->may_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->may_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jun_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jun_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jul_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jul_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->aug_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->aug_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->sep_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->sep_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->oct_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->oct_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->nov_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->nov_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->dec_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->dec_new, 2, '.', ',') }}</td>
            </tr>
            <?php } ?>
        @endforeach
        <!-- END SEIB -->
        <!-- START SEIT -->
        <?php
        $i = 0;
        foreach ($ptseit as $d) {
            if($d->total_old != 0 or $d->total_new != 0){
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
                <td>
                    <?php
                    $total_year_old = $total_year_old + $d->total_old;
                    echo number_format($d->total_old, 2, '.', ',');
                    ?>
                </td>
                <td>
                    <?php
                    $total_year_new = $total_year_new + $d->total_new;
                    echo number_format($d->total_new, 2, '.', ',');
                    ?>
                </td>
                <td>
                    <?=($d->total_old != 0)? number_format($d->total_new/$d->total_old*100, 2, '.', ',') : 0 ?>
            </td>
                <td>{{ number_format($d->jan_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jan_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->feb_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->feb_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->mar_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->mar_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->apr_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->apr_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->may_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->may_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jun_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jun_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jul_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jul_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->aug_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->aug_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->sep_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->sep_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->oct_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->oct_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->nov_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->nov_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->dec_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->dec_new, 2, '.', ',') }}</td>
            </tr>
            <?php } ?>
        @endforeach
        <!-- END SEIT -->
        <!-- START RJB -->
        <?php
        $i = 0;
        foreach ($ptrjb as $d) {
            if($d->total_old != 0 or $d->total_new != 0){
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
                <td>
                    <?php
                    $total_year_old = $total_year_old + $d->total_old;
                    echo number_format($d->total_old, 2, '.', ',');
                    ?>
                </td>
                <td>
                    <?php
                    $total_year_new = $total_year_new + $d->total_new;
                    echo number_format($d->total_new, 2, '.', ',');
                    ?>
                </td>
                <td>
                    <?=($d->total_old != 0)? number_format($d->total_new/$d->total_old*100, 2, '.', ',') : 0 ?>
            </td>
                <td>{{ number_format($d->jan_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jan_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->feb_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->feb_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->mar_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->mar_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->apr_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->apr_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->may_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->may_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jun_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jun_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jul_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jul_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->aug_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->aug_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->sep_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->sep_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->oct_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->oct_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->nov_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->nov_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->dec_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->dec_new, 2, '.', ',') }}</td>
            </tr>
            <?php } ?>
        @endforeach
        <!-- END RJB -->
        <!-- START RPM -->
        <?php
        $i = 0;
        foreach ($ptrpm as $d) {
            if($d->total_old != 0 or $d->total_new != 0){
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
                <td>
                    <?php
                    $total_year_old = $total_year_old + $d->total_old;
                    echo number_format($d->total_old, 2, '.', ',');
                    ?>
                </td>
                <td>
                    <?php
                    $total_year_new = $total_year_new + $d->total_new;
                    echo number_format($d->total_new, 2, '.', ',');
                    ?>
                </td>
                <td>
                    <?=($d->total_old != 0)? number_format($d->total_new/$d->total_old*100, 2, '.', ',') : 0 ?>
            </td>
                <td>{{ number_format($d->jan_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jan_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->feb_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->feb_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->mar_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->mar_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->apr_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->apr_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->may_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->may_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jun_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jun_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jul_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->jul_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->aug_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->aug_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->sep_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->sep_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->oct_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->oct_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->nov_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->nov_new, 2, '.', ',') }}</td>
                <td>{{ number_format($d->dec_old, 2, '.', ',') }}</td>
                <td>{{ number_format($d->dec_new, 2, '.', ',') }}</td>
            </tr>
            <?php } ?>
        @endforeach
        <!-- END RPM -->
        <tr>
            <td colspan="2">CUMULATIVE</td>
            <td>{{number_format($total_year_old, 2, '.', ',')}}</td>
            <td>{{number_format($total_year_new, 2, '.', ',')}}</td>
            <td><?=($total_year_old != 0)? number_format($total_year_new/$total_year_old*100, 2, '.', ',') : 0 ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>

</html>
