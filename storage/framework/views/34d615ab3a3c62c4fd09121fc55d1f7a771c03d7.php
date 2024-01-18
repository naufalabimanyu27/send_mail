<html>

<head>
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>">
    <style>
        td {
            padding: 5px !important;
        }
    </style>
</head>

<body onload="exportToExcel()">
    <h3>Open this link to download the excel : <a href="https://sendmailoracle.riyadi.co.id/mailexcel/<?php echo e($email); ?>" target="_blank">https://sendmailoracle.riyadi.co.id/mailexcel/<?php echo e($email); ?></a></h3>
    <p>*Data on this link will only available for 1 week</p>
    <table class="table table-striped" id="tabel1">
        <thead class="thead-dark">
            <tr style="border: 1px solid;">
                <th style="border: 1px solid;">SQ NO</th>
                <th style="border: 1px solid;">SQ DATE</th>
                <th style="border: 1px solid;">SQ MONTH</th>
                <th style="border: 1px solid;">CUSTOMER</th>
                <th style="border: 1px solid;">CITY</th>
                <th style="border: 1px solid;">SQ FINISHED</th>
                <th style="border: 1px solid;">SQ APPROVED</th>
                <th style="border: 1px solid;">SALES</th>
                <th style="border: 1px solid;">VALUE</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style="border: 1px solid;">
                <td style="border: 1px solid;"><?php echo e($d->sq_no); ?></td>
                <?php
                $datetime = new DateTime($d->sq_date);
                $date = $datetime->format('Y-m-d');
                ?>
                <td style="border: 1px solid;"><?php echo e($date); ?></td>
                <td style="border: 1px solid;"><?php echo e($d->sq_month); ?></td>
                <td style="border: 1px solid;"><?php echo e($d->sq_cust); ?></td>
                <td style="border: 1px solid;"><?php echo e($d->cust_city); ?></td>
                <td style="border: 1px solid;"><?php echo e($d->sq_fnished); ?></td>
                <td style="border: 1px solid;"><?php echo e($d->sq_approved); ?></td>
                <td style="border: 1px solid;"><?php echo e($d->sq_sales); ?></td>
                <td style="border: 1px solid;"><?php echo e($d->sq_value); ?></td>
            </tr>
            <?php $total = $d->sq_value + $total; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr style="border: 1px solid;">
                <td colspan="8" style="text-align: right;">TOTAL VALUE = </td>
                <td style="border: 1px solid;"><?php echo e($total); ?></td>
            </tr>
        </tbody>
    </table>
    <!-- table to excel javascript -->
    <script lang="javascript" src="https://cdn.sheetjs.com/xlsx-0.20.0/package/dist/xlsx.full.min.js"></script>
    <script>
        function exportToExcel() {
            //Get HTML content of the tables
            var htmlTable1 = document.getElementById('tabel1').outerHTML;

            //Create a workbook
            var wb = XLSX.utils.book_new();

            //Convert HTML content to a worksheet
            var ws1 = XLSX.utils.table_to_sheet(document.getElementById('tabel1'));

            //Add worksheets to the workbook
            XLSX.utils.book_append_sheet(wb, ws1, 'DATA');

            //Save the workbook to a file
            XLSX.writeFile(wb, 'tables.xlsx');
        }
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\send_mail\resources\views/mail.blade.php ENDPATH**/ ?>