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
            <?php
            $currentDate = date('Y-m-d');
            $lastMonthDate = date('Ym', strtotime('-1 month', strtotime($currentDate)));
            $lastYearMonthDate = date('Ym', strtotime('-1 year -1 month', strtotime($currentDate)));

            ?>
            <td>SYSTEM</td>
            <td>BRAND</td>
            <td>DATA <?= $lastYearMonthDate ?></td>
            <td>DATA <?= $lastMonthDate ?></td>
            <td style="font-weight:bold;">SELISIH (Rp.)</td>
            <td style="font-weight:bold;">SELISIH (%)</td>
        </tr>
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
                <td rowspan="{{$i}}">{{$d->erp}}</td>
            <?php
                $x++;
            }
            ?>
            <td>{{$d->brand}}</td>
            <td>{{$d->old_data}}</td>
            <td>{{$d->new_data}}</td>
            <td style="color: @if($d->angka > 0) green; @else red; @endif">{{$d->selisih}}</td>
            <td style="color: @if($d->angka > 0) green; @else red; @endif">{{$d->selisih_persen}}</td>
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
                <td rowspan="{{$i}}">{{$d->erp}}</td>
            <?php
                $x++;
            }
            ?>
            <td>{{$d->brand}}</td>
            <td>{{$d->old_data}}</td>
            <td>{{$d->new_data}}</td>
            <td style="color: @if($d->angka > 0) green; @else red; @endif">{{$d->selisih}}</td>
            <td style="color: @if($d->angka > 0) green; @else red; @endif">{{$d->selisih_persen}}</td>
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
                <td rowspan="{{$i}}">{{$d->erp}}</td>
            <?php
                $x++;
            }
            ?>
            <td>{{$d->brand}}</td>
            <td>{{$d->old_data}}</td>
            <td>{{$d->new_data}}</td>
            <td style="color: @if($d->angka > 0) green; @else red; @endif">{{$d->selisih}}</td>
            <td style="color: @if($d->angka > 0) green; @else red; @endif">{{$d->selisih_persen}}</td>
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
                <td rowspan="{{$i}}">{{$d->erp}}</td>
            <?php
                $x++;
            }
            ?>
            <td>{{$d->brand}}</td>
            <td>{{$d->old_data}}</td>
            <td>{{$d->new_data}}</td>
            <td style="color: @if($d->angka > 0) green; @else red; @endif">{{$d->selisih}}</td>
            <td style="color: @if($d->angka > 0) green; @else red; @endif">{{$d->selisih_persen}}</td>
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
                <td rowspan="{{$i}}">{{$d->erp}}</td>
            <?php
                $x++;
            }
            ?>
            <td>{{$d->brand}}</td>
            <td>{{$d->old_data}}</td>
            <td>{{$d->new_data}}</td>
            <td style="color: @if($d->angka > 0) green; @else red; @endif">{{$d->selisih}}</td>
            <td style="color: @if($d->angka > 0) green; @else red; @endif">{{$d->selisih_persen}}</td>
        </tr>
        @endforeach
        <!-- END RPM -->
    </table>
</body>

</html>