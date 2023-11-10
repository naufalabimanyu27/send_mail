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
                    echo $d->total_old;
                    ?>
                </td>
                <td>
                    <?php
                    $total_year_new = $total_year_new + $d->total_new;
                    echo $d->total_new;
                    ?>
                </td>
                <td>{{ $d->jan_old }}</td>
                <td>{{ $d->jan_new }}</td>
                <td>{{ $d->feb_old }}</td>
                <td>{{ $d->feb_new }}</td>
                <td>{{ $d->mar_old }}</td>
                <td>{{ $d->mar_new }}</td>
                <td>{{ $d->apr_old }}</td>
                <td>{{ $d->apr_new }}</td>
                <td>{{ $d->may_old }}</td>
                <td>{{ $d->may_new }}</td>
                <td>{{ $d->jun_old }}</td>
                <td>{{ $d->jun_new }}</td>
                <td>{{ $d->jul_old }}</td>
                <td>{{ $d->jul_new }}</td>
                <td>{{ $d->aug_old }}</td>
                <td>{{ $d->aug_new }}</td>
                <td>{{ $d->sep_old }}</td>
                <td>{{ $d->sep_new }}</td>
                <td>{{ $d->oct_old }}</td>
                <td>{{ $d->oct_new }}</td>
                <td>{{ $d->nov_old }}</td>
                <td>{{ $d->nov_new }}</td>
                <td>{{ $d->dec_old }}</td>
                <td>{{ $d->dec_new }}</td>
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
                    echo $d->total_old;
                    ?>
                </td>
                <td>
                    <?php
                    $total_year_new = $total_year_new + $d->total_new;
                    echo $d->total_new;
                    ?>
                </td>
                <td>{{ $d->jan_old }}</td>
                <td>{{ $d->jan_new }}</td>
                <td>{{ $d->feb_old }}</td>
                <td>{{ $d->feb_new }}</td>
                <td>{{ $d->mar_old }}</td>
                <td>{{ $d->mar_new }}</td>
                <td>{{ $d->apr_old }}</td>
                <td>{{ $d->apr_new }}</td>
                <td>{{ $d->may_old }}</td>
                <td>{{ $d->may_new }}</td>
                <td>{{ $d->jun_old }}</td>
                <td>{{ $d->jun_new }}</td>
                <td>{{ $d->jul_old }}</td>
                <td>{{ $d->jul_new }}</td>
                <td>{{ $d->aug_old }}</td>
                <td>{{ $d->aug_new }}</td>
                <td>{{ $d->sep_old }}</td>
                <td>{{ $d->sep_new }}</td>
                <td>{{ $d->oct_old }}</td>
                <td>{{ $d->oct_new }}</td>
                <td>{{ $d->nov_old }}</td>
                <td>{{ $d->nov_new }}</td>
                <td>{{ $d->dec_old }}</td>
                <td>{{ $d->dec_new }}</td>
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
                    echo $d->total_old;
                    ?>
                </td>
                <td>
                    <?php
                    $total_year_new = $total_year_new + $d->total_new;
                    echo $d->total_new;
                    ?>
                </td>
                <td>{{ $d->jan_old }}</td>
                <td>{{ $d->jan_new }}</td>
                <td>{{ $d->feb_old }}</td>
                <td>{{ $d->feb_new }}</td>
                <td>{{ $d->mar_old }}</td>
                <td>{{ $d->mar_new }}</td>
                <td>{{ $d->apr_old }}</td>
                <td>{{ $d->apr_new }}</td>
                <td>{{ $d->may_old }}</td>
                <td>{{ $d->may_new }}</td>
                <td>{{ $d->jun_old }}</td>
                <td>{{ $d->jun_new }}</td>
                <td>{{ $d->jul_old }}</td>
                <td>{{ $d->jul_new }}</td>
                <td>{{ $d->aug_old }}</td>
                <td>{{ $d->aug_new }}</td>
                <td>{{ $d->sep_old }}</td>
                <td>{{ $d->sep_new }}</td>
                <td>{{ $d->oct_old }}</td>
                <td>{{ $d->oct_new }}</td>
                <td>{{ $d->nov_old }}</td>
                <td>{{ $d->nov_new }}</td>
                <td>{{ $d->dec_old }}</td>
                <td>{{ $d->dec_new }}</td>
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
                    echo $d->total_old;
                    ?>
                </td>
                <td>
                    <?php
                    $total_year_new = $total_year_new + $d->total_new;
                    echo $d->total_new;
                    ?>
                </td>
                <td>{{ $d->jan_old }}</td>
                <td>{{ $d->jan_new }}</td>
                <td>{{ $d->feb_old }}</td>
                <td>{{ $d->feb_new }}</td>
                <td>{{ $d->mar_old }}</td>
                <td>{{ $d->mar_new }}</td>
                <td>{{ $d->apr_old }}</td>
                <td>{{ $d->apr_new }}</td>
                <td>{{ $d->may_old }}</td>
                <td>{{ $d->may_new }}</td>
                <td>{{ $d->jun_old }}</td>
                <td>{{ $d->jun_new }}</td>
                <td>{{ $d->jul_old }}</td>
                <td>{{ $d->jul_new }}</td>
                <td>{{ $d->aug_old }}</td>
                <td>{{ $d->aug_new }}</td>
                <td>{{ $d->sep_old }}</td>
                <td>{{ $d->sep_new }}</td>
                <td>{{ $d->oct_old }}</td>
                <td>{{ $d->oct_new }}</td>
                <td>{{ $d->nov_old }}</td>
                <td>{{ $d->nov_new }}</td>
                <td>{{ $d->dec_old }}</td>
                <td>{{ $d->dec_new }}</td>
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
                    echo $d->total_old;
                    ?>
                </td>
                <td>
                    <?php
                    $total_year_new = $total_year_new + $d->total_new;
                    echo $d->total_new;
                    ?>
                </td>
                <td>{{ $d->jan_old }}</td>
                <td>{{ $d->jan_new }}</td>
                <td>{{ $d->feb_old }}</td>
                <td>{{ $d->feb_new }}</td>
                <td>{{ $d->mar_old }}</td>
                <td>{{ $d->mar_new }}</td>
                <td>{{ $d->apr_old }}</td>
                <td>{{ $d->apr_new }}</td>
                <td>{{ $d->may_old }}</td>
                <td>{{ $d->may_new }}</td>
                <td>{{ $d->jun_old }}</td>
                <td>{{ $d->jun_new }}</td>
                <td>{{ $d->jul_old }}</td>
                <td>{{ $d->jul_new }}</td>
                <td>{{ $d->aug_old }}</td>
                <td>{{ $d->aug_new }}</td>
                <td>{{ $d->sep_old }}</td>
                <td>{{ $d->sep_new }}</td>
                <td>{{ $d->oct_old }}</td>
                <td>{{ $d->oct_new }}</td>
                <td>{{ $d->nov_old }}</td>
                <td>{{ $d->nov_new }}</td>
                <td>{{ $d->dec_old }}</td>
                <td>{{ $d->dec_new }}</td>
            </tr>
            <?php } ?>
        @endforeach
        <!-- END RPM -->
        <tr>
            <td colspan="2">CUMULATIVE</td>
            <td>{{$total_year_old}}</td>
            <td>{{$total_year_new}}</td>
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
