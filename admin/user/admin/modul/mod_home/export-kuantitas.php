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

//STYLING TABLE


$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->getPageSetup()->setHorizontalCentered(true);
$activeWorksheet->getColumnDimension('A')->setAutoSize(true);
$activeWorksheet->getColumnDimension('B')->setWidth(35);
$activeWorksheet->getColumnDimension('C')->setWidth(9);



$tableborder = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '000000'],
        ],
    ],
];




$activeWorksheet->setCellValue('A1', 'Export Laporan Kuantitas Penjualan');
$activeWorksheet->mergeCells('A1:C1');
$activeWorksheet->getStyle('A1:C1')->getFont()->setBold(true);
$activeWorksheet->getStyle('A1:C1')->getAlignment()->setHorizontal('center');

$activeWorksheet->setCellValue('A2', date('d/m/Y', strtotime($tgl_awal)) . " s.d " . date('d/m/Y', strtotime($tgl_akhir)));
$activeWorksheet->mergeCells('A2:C2');
$activeWorksheet->getStyle('A2:C2')->getAlignment()->setHorizontal('center');

$activeWorksheet->setCellValue('A4', 'No.');
$activeWorksheet->getStyle('A4')->getAlignment()->setHorizontal('center');
$activeWorksheet->setCellValue('B4', 'Nama Menu');
$activeWorksheet->setCellValue('C4', 'Qty');
$activeWorksheet->getStyle('C4')->getAlignment()->setHorizontal('center');
$activeWorksheet->getStyle('A4:C4')->getFont()->setBold(true);

//LOOP MENU YANG ADA DIDALAM DATABASE
$no = 1;
$first_row=5;
$q_menu = mysqli_query($koneksi, "SELECT * FROM tb_menu");
while ($menu = mysqli_fetch_array($q_menu)) {
    $activeWorksheet->setCellValue('A' . $first_row, $no);
    $activeWorksheet->setCellValue('B' . $first_row, $menu['nama_menu']);
    //DAPATKAN KUANTITI PENJUALAN BERDASARKAN MENUNYA
    $q_kuantiti = mysqli_query($koneksi, "SELECT SUM(qty) as qty_total FROM tb_cart WHERE tgl_transaksi between '$tgl_awal' and '$tgl_akhir' and id_menu='$menu[id_menu]'");
    $kuantiti = mysqli_fetch_array($q_kuantiti);
    //JIKA GA ADA PENJUALAN MAKA KUANTITI 0
    if ($kuantiti['qty_total']=="" || $kuantiti['qty_total']==0) {
    $activeWorksheet->setCellValue('C' . $first_row, '0');    
    } else {
    $activeWorksheet->setCellValue('C' . $first_row, $kuantiti['qty_total']);    
    }
    $last_row = $first_row + 1;
        
    $first_row++;
    $no++;
    

    
    $activeWorksheet->getStyle('A4' . ":C" . $last_row)->applyFromArray($tableborder);
}

$activeWorksheet->setCellValue('A' . $last_row, "Total");
$activeWorksheet->mergeCells('A' . $last_row . ':B' . $last_row);
$activeWorksheet->setCellValue('C' . $last_row, "=SUM(C5:C" .($last_row-1).")");
$activeWorksheet->getStyle('A' . $last_row . ':C' . $last_row)->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('ffd1d9e6');
$activeWorksheet->getStyle('A' . $last_row . ':C' . $last_row)->getFont()->setBold(true);



// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Laporan Kuantitas Penjualan - '.$name_tgl_awal.'_'.$name_tgl_akhir.'.xlsx"'); // Set nama file excel nya
$activeWorksheet->setTitle("EXPORT LAPORAN KUANTITAS");
header('Cache-Control: max-age=0');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
