<?php
ob_start();
session_start();
// error_reporting(0);

//PREPARE DATA
require '../../../../vendor/autoload.php';
include "../../../../config/koneksi.php";

//DAPATKAN DATA DARI FORM
$tgl_awal = ($_POST['tgl_awal']) . " 00:00:00";
$tgl_akhir = ($_POST['tgl_akhir']) . " 23:59:59";

//SIAPKAN UNTUK PEMFORMATAN PENAMAAN FILE
$name_tgl_awal = date('d-m-Y', strtotime($tgl_awal));
$name_tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));

date_default_timezone_set('Asia/Jakarta');
$date = date("d/m/Y H:i:s");


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Title;




//STYLING TABLE


$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->getPageSetup()->setHorizontalCentered(true);
$activeWorksheet->getColumnDimension('A')->setAutoSize(true);
$activeWorksheet->getColumnDimension('B')->setAutoSize(true);
$activeWorksheet->getColumnDimension('C')->setAutoSize(true);
$activeWorksheet->getColumnDimension('D')->setAutoSize(true);
$activeWorksheet->getColumnDimension('E')->setAutoSize(true);
$activeWorksheet->getColumnDimension('F')->setAutoSize(true);


// Proses file excel
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Laporan Harian '.$name_tgl_awal.'_'.$name_tgl_akhir.'.xlsx"'); // Set nama file excel nya
$spreadsheet->setActiveSheetIndex(0);
$activeWorksheet->setTitle("HARIAN");
header('Cache-Control: max-age=0');

$tableborder = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '000000'],
        ],
    ],
];




$activeWorksheet->setCellValue('A1', 'Export Laporan Harian');
$activeWorksheet->mergeCells('A1:F1');
$activeWorksheet->getStyle('A1:F1')->getFont()->setBold(true);
$activeWorksheet->getStyle('A1:F1')->getAlignment()->setHorizontal('center');

$activeWorksheet->setCellValue('A2', date('d/m/Y', strtotime($tgl_awal)) . " s.d " . date('d/m/Y', strtotime($tgl_akhir)));
$activeWorksheet->mergeCells('A2:F2');
$activeWorksheet->getStyle('A2:F2')->getAlignment()->setHorizontal('center');

$activeWorksheet->setCellValue('B4', 'Cash');
$activeWorksheet->setCellValue('C4', ':');
$activeWorksheet->mergeCells('D4:F4');
//CARI TOTAL CASH
$q_caricash = mysqli_query($koneksi, "SELECT SUM(total_harga) AS total_cash FROM (SELECT total_harga FROM tb_transaksi INNER JOIN tb_cart ON tb_cart.id_transaksi = tb_transaksi.id_transaksi WHERE tb_transaksi.id_transaksi IN (SELECT id_transaksi FROM tb_transaksi WHERE tgl_transaksi_final BETWEEN '$tgl_awal' AND '$tgl_akhir' and metode_pembayaran='Cash') GROUP by tb_transaksi.id_transaksi) as total_cash");
$caricash = mysqli_fetch_array($q_caricash);
if (empty($caricash['total_cash'])) {
    $activeWorksheet->setCellValue('D4', "0");
} else {
    $activeWorksheet->setCellValue('D4', $caricash['total_cash']);
}


$activeWorksheet->setCellValue('B5', 'Bank Transfer');
$activeWorksheet->setCellValue('C5', ':');
$activeWorksheet->mergeCells('D5:F5');
//CARI TOTAL BANK TRANSFER
$q_caritf = mysqli_query($koneksi, "SELECT SUM(total_harga) AS total_tf FROM (SELECT total_harga FROM tb_transaksi INNER JOIN tb_cart ON tb_cart.id_transaksi = tb_transaksi.id_transaksi WHERE tb_transaksi.id_transaksi IN (SELECT id_transaksi FROM tb_transaksi WHERE tgl_transaksi_final BETWEEN '$tgl_awal' AND '$tgl_akhir' and metode_pembayaran='Bank Transfer') GROUP by tb_transaksi.id_transaksi) as total_tf");
$caritf = mysqli_fetch_array($q_caritf);
if (empty($caritf['total_tf'])){
    $activeWorksheet->setCellValue('D5', "0");
} else {
    $activeWorksheet->setCellValue('D5', $caritf['total_tf']);
}


$activeWorksheet->setCellValue('B6', 'GoPay');
$activeWorksheet->setCellValue('C6', ':');
$activeWorksheet->mergeCells('D6:F6');
//CARI TOTAL GoPay
$q_carigopay = mysqli_query($koneksi, "SELECT SUM(total_harga) AS total_gopay FROM (SELECT total_harga FROM tb_transaksi INNER JOIN tb_cart ON tb_cart.id_transaksi = tb_transaksi.id_transaksi WHERE tb_transaksi.id_transaksi IN (SELECT id_transaksi FROM tb_transaksi WHERE tgl_transaksi_final BETWEEN '$tgl_awal' AND '$tgl_akhir' and metode_pembayaran='GoPay') GROUP by tb_transaksi.id_transaksi) as total_gopay");
$carigopay = mysqli_fetch_array($q_carigopay);
if (empty($carigopay['total_gopay'])){
    $activeWorksheet->setCellValue('D6', "0");
} else {
    $activeWorksheet->setCellValue('D6', $carigopay['total_gopay']);
}


$activeWorksheet->setCellValue('B7', 'GoFood');
$activeWorksheet->setCellValue('C7', ':');
$activeWorksheet->mergeCells('D7:F7');
//CARI TOTAL GoFood
$q_carigofood= mysqli_query($koneksi, "SELECT SUM(total_harga) AS total_gofood FROM (SELECT total_harga FROM tb_transaksi INNER JOIN tb_cart ON tb_cart.id_transaksi = tb_transaksi.id_transaksi WHERE tb_transaksi.id_transaksi IN (SELECT id_transaksi FROM tb_transaksi WHERE tgl_transaksi_final BETWEEN '$tgl_awal' AND '$tgl_akhir' and metode_pembayaran='GoFood') GROUP by tb_transaksi.id_transaksi) as total_gofood");
$carigofood = mysqli_fetch_array($q_carigofood);
if (empty($carigofood['total_gofood'])){
    $activeWorksheet->setCellValue('D7', "0");
} else {
    $activeWorksheet->setCellValue('D7', $carigofood['total_gofood']);
}


$activeWorksheet->setCellValue('B8', 'Total');
$activeWorksheet->setCellValue('C8', ':');
$activeWorksheet->setCellValue('D8', '=SUM(D4:D7)');
$activeWorksheet->getStyle('B8:D8')->getFont()->setBold(true);
$activeWorksheet->mergeCells('D8:F8');
$activeWorksheet->getStyle('D4:D8')->getNumberFormat()->setFormatCode('#,##0');

//MULAI LOOPING DATANYA SESUAI DENGAN DATA YANG SUDAH DI GET

$first_row = 10;
$second_row = 11;
$first_menu_row = 12;

$q_loop = mysqli_query($koneksi, "SELECT *, tb_cart.id_transaksi as id_transaksi_cari FROM tb_cart JOIN tb_transaksi ON (tb_cart.id_transaksi=tb_transaksi.id_transaksi) JOIN tb_menu ON (tb_menu.id_menu=tb_cart.id_menu) WHERE tb_cart.tgl_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir'  GROUP BY tb_cart.id_transaksi ORDER BY tgl_transaksi ASC");
while ($loop = mysqli_fetch_array($q_loop)) {
    //JIKA WAITING PAYMENT MAKA HEADER WARNA MERAH
    if ($loop['metode_pembayaran']=="WAITING PAYMENT") {
        $activeWorksheet->getStyle('A' . $first_row . ':F' . $first_row)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffff0000');
    
    }

    $activeWorksheet->setCellValue('A' . $first_row, $loop['nama_bill'] . " - " . $loop['tgl_transaksi']);
    $activeWorksheet->mergeCells('A' . $first_row . ':F' . $first_row);
    $activeWorksheet->setCellValue('A' . $second_row, "No.");
    $activeWorksheet->setCellValue('B' . $second_row, "Nama Menu");
    $activeWorksheet->setCellValue('C' . $second_row, "Qty");
    $activeWorksheet->setCellValue('D' . $second_row, "Harga");
    $activeWorksheet->setCellValue('E' . $second_row, "Metode Pembayaran");
    $activeWorksheet->setCellValue('F' . $second_row, "Jenis");
    $activeWorksheet->getStyle('A' . $second_row . ':F' . $second_row)->getFont()->setBold(true);


    $no_urut = 1;
    
    $caritotalakhir = "";
    $q_loopmenu = mysqli_query($koneksi, "SELECT * FROM tb_cart LEFT JOIN tb_menu ON (tb_cart.id_menu=tb_menu.id_menu) LEFT JOIN tb_transaksi ON (tb_transaksi.id_transaksi=tb_cart.id_transaksi) WHERE tb_cart.id_transaksi='$loop[id_transaksi_cari]'");
    $q_countmenu = mysqli_query($koneksi, "SELECT COUNT(id_transaksi) as count_menu FROM tb_cart WHERE id_transaksi='$loop[id_transaksi_cari]'");
    $countmenu = mysqli_fetch_array($q_countmenu);
    $penambahfirstrow = $countmenu['count_menu'] + 4;
    $last_row = $second_row + $penambahfirstrow - 3;

    $diskon = "";
    while ($loopmenu = mysqli_fetch_array($q_loopmenu)) {
        $activeWorksheet->setCellValue('A' . $first_menu_row, $no_urut);
        $activeWorksheet->setCellValue('B' . $first_menu_row, $loopmenu['nama_menu']);
        $activeWorksheet->setCellValue('C' . $first_menu_row, $loopmenu['qty']);
        //tentukan harga berdasarkan transaksi offline atau online
        if ($loopmenu['jenis_pembayaran']=='online') {
            $activeWorksheet->setCellValue('D' . $first_menu_row, ($loopmenu['qty'] * $loopmenu['harga_online'])); 
        } else {
            $activeWorksheet->setCellValue('D' . $first_menu_row, ($loopmenu['qty'] * $loopmenu['harga_offline']));
        }
        
        $activeWorksheet->getStyle('D' . $first_menu_row)->getNumberFormat()->setFormatCode('#,##0');
        
        $activeWorksheet->setCellValue('E' . $first_menu_row, $loopmenu['metode_pembayaran']);
        $activeWorksheet->setCellValue('F' . $first_menu_row, $loopmenu['jenis_pembayaran']);

        //CARI TOTAL PER MASING MASING TRANSAKSI
        $q_caritotal = mysqli_query($koneksi, "SELECT SUM(total_harga) AS total_akhir FROM tb_cart JOIN tb_transaksi ON (tb_cart.id_transaksi=tb_transaksi.id_transaksi) WHERE tb_cart.id_transaksi='$loopmenu[id_transaksi]'");
        $caritotal = mysqli_fetch_array($q_caritotal);
        $caritotalakhir = $caritotal['total_akhir'];

        //STORE DISKON KE VARIABLE
        $diskon = $loopmenu['nominal_diskon'];

        $no_urut++;
        $first_menu_row++;
    }

    $activeWorksheet->setCellValue('A' . $last_row, 'Diskon');
    $activeWorksheet->getStyle('A' . $last_row)->getAlignment()->setHorizontal('center');
    $activeWorksheet->getStyle('A' . $last_row)->getFont()->setBold(true);
    $activeWorksheet->mergeCells('A' . $last_row . ':C' . $last_row);
    $activeWorksheet->setCellValue('D' . $last_row, $diskon);
    $activeWorksheet->getStyle('D' . $last_row)->getNumberFormat()->setFormatCode('#,##0');
    $activeWorksheet->getStyle('D' . $last_row)->getFont()->setBold(true);
    $activeWorksheet->mergeCells('E' . $last_row . ':F' . $last_row);
    $activeWorksheet->getStyle('A' . $last_row . ':C' . $last_row)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffd1d9e6');
    $activeWorksheet->getStyle('E' . $last_row . ':F' . $last_row)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffd1d9e6');

    $activeWorksheet->setCellValue('A' . $last_row + 1, 'Total');
    $activeWorksheet->getStyle('A' . $last_row + 1)->getAlignment()->setHorizontal('center');
    $activeWorksheet->getStyle('A' . $last_row + 1)->getFont()->setBold(true);
    $activeWorksheet->mergeCells('A' . $last_row + 1 . ':C' . $last_row + 1);
    $activeWorksheet->setCellValue('D' . $last_row + 1, '=SUM(D'.($last_row - $countmenu['count_menu']).':D'.($last_row - 1).')-D' . $last_row);
    $activeWorksheet->getStyle('D' . $last_row + 1)->getNumberFormat()->setFormatCode('#,##0');
    $activeWorksheet->getStyle('D' . $last_row + 1)->getFont()->setBold(true);
    $activeWorksheet->mergeCells('E' . $last_row + 1 . ':F' . $last_row + 1);
    $activeWorksheet->getStyle('A' . $last_row + 1 . ':C' . $last_row + 1)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffd1d9e6');
    $activeWorksheet->getStyle('E' . $last_row + 1 . ':F' . $last_row + 1)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffd1d9e6');

    $activeWorksheet->getStyle('A' . $first_row . ":F" . $last_row + 1)->applyFromArray($tableborder);


    $first_row += $penambahfirstrow;
    $second_row += $penambahfirstrow;
    // $first_menu_row++;
    $first_menu_row += 4;
    $last_row += 3;
}

//INI UNTUK SISI KANAN BUAT CODING KHUSUS UNTUK TAMPILKAN GRAFIKNYA
$activeWorksheet->getColumnDimension('H')->setWidth(36);
$activeWorksheet->getColumnDimension('I')->setWidth(10);

$activeWorksheet->setCellValue('H4', 'Menu Terjual');
$activeWorksheet->mergeCells('H4:I4');
$activeWorksheet->getStyle('H4')->getFont()->setBold(true);
$activeWorksheet->getStyle('H4:I4')->getAlignment()->setHorizontal('center');

$activeWorksheet->setCellValue('H5', 'Nama Menu');
$activeWorksheet->setCellValue('I5', 'Qty');

//SIAP SIAP LOOP MENU TERJUAL
$first_grafik_row = 6;
$q_loopmenugrafik = mysqli_query($koneksi, "SELECT *, tb_menu.id_menu as id_menunya FROM tb_cart JOIN tb_menu ON (tb_cart.id_menu=tb_menu.id_menu) WHERE tb_cart.tgl_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY tb_menu.id_menu");
while ($loopmenugrafik = mysqli_fetch_array($q_loopmenugrafik)) {
    $activeWorksheet->setCellValue('H'.$first_grafik_row, $loopmenugrafik['nama_menu']);
    //LAKUKAN LOOP KEMBALI DIDALAM SINI, CARI TOTAL QTY BERDASARKAN MENU TERSEBUT
    $q_cariqty = mysqli_query($koneksi, "SELECT SUM(qty) as total_qty FROM tb_cart WHERE tgl_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir' AND id_menu='$loopmenugrafik[id_menunya]'");
    $cariqty = mysqli_fetch_array($q_cariqty);
    $activeWorksheet->setCellValue('I'.$first_grafik_row, $cariqty['total_qty']);

    $activeWorksheet->getStyle('H4' . ":I" . $first_grafik_row)->applyFromArray($tableborder);
    $first_grafik_row++;
    $lastrowgrafik = $first_grafik_row + 2;
}


$dsl=array(
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'HARIAN!$I$5', NULL, 1, [], NULL, "6488ea"), //Cause of the error
);



$xal=array(
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'HARIAN!$H$6:$H$'.$first_grafik_row, NULL, $first_grafik_row),
);

$dsv = array(
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'HARIAN!$I$6:$I$'.$first_grafik_row, NULL, $first_grafik_row),
);

$ds = new DataSeries(
    DataSeries::TYPE_BARCHART,
    DataSeries::GROUPING_STANDARD,
    range(0, count($dsv)-1),
    $dsl,
    $xal,
    $dsv
);

$pa = new PlotArea(NULL, array($ds));


$legend = new Legend(Legend::POSITION_RIGHT, NULL, false);

$title = new Title('Menu Terjual');


$chart = new Chart(
    'chart1',
    $title,
    $legend,
    $pa,
    0,
    0,
    NULL,
    NULL
);


$chart->setTopLeftPosition('H'.$lastrowgrafik);
$chart->setBottomRightPosition('N37');

$activeWorksheet->addChart($chart);





$writer = new Xlsx($spreadsheet);
ob_end_clean();
$writer->setIncludeCharts(true);
$writer->save('php://output');
