<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportExcel extends BaseController
{
    public function export_excel()
    {
        // Buat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Ambil objek aktif (sheet aktif)
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_FOLIO);
        $sheet->getRowDimension(1)->setRowHeight(30);
        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        $fontStyle = [
            'font' => [
                'name' => 'Times New Roman',
                'size' => 12,
            ],
        ];

        // Isi data ke dalam sheet


        $centerStyle = [
            'alignment' => [
                //'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $sheet->setCellValue('A1', 'DATA KEPEMUDAAN MAKASSAR')->mergeCells('A1:V1');
        //$sheet->getStyle('A1:J1')->applyFromArray($fontStyle);
        //$sheet->getStyle('A1:J1')->applyFromArray($centerStyle);

        $sheet->setCellValue('A3', 'NO');
        $sheet->setCellValue('B3', 'NAMA');
        $sheet->setCellValue('C3', 'ALAMAT');
        $sheet->setCellValue('D3', 'JENIS KELAMIN');
        $sheet->setCellValue('E3', 'AGAMA');
        $sheet->setCellValue('F3', 'TANGGAL LAHIR');
        $sheet->setCellValue('G3', 'TEMPAT LAHIR');
        $sheet->setCellValue('H3', 'NIK');
        $sheet->setCellValue('I3', 'NO. KK');
        $sheet->setCellValue('J3', 'PEKERJAAN');
        $sheet->setCellValue('K3', 'NO. HP');
        $sheet->setCellValue('L3', 'RT');
        $sheet->setCellValue('M3', 'RW');
        $sheet->setCellValue('N3', 'STATUS PERKAWINAN');
        $sheet->setCellValue('O3', 'USIA');
        $sheet->setCellValue('P3', 'KODE KEC');
        $sheet->setCellValue('Q3', 'KODE KEL');
        $sheet->setCellValue('R3', 'DATE OF DEATH');
        $sheet->setCellValue('S3', 'DISABILITAS');
        $sheet->setCellValue('T3', 'IS DEAD');
        $sheet->setCellValue('U3', 'IS MOVE');
        $sheet->setCellValue('V3', 'KETERANGAN');

        $data = DB::table('citizens')->take(500)->get();

        $row = 4;

        foreach ($data as $index => $rekap) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $rekap->nama);
            $sheet->setCellValue('C' . $row, $rekap->alamat);
            $sheet->setCellValue('D' . $row, $rekap->jenis_kelamin);
            $sheet->setCellValue('E' . $row, $rekap->agama);
            $sheet->setCellValue('F' . $row, $rekap->tanggal_lahir);
            $sheet->setCellValue('G' . $row, $rekap->tempat_lahir);
            $sheet->setCellValue('H' . $row, $rekap->nik);
            $sheet->setCellValue('I' . $row, $rekap->no_kk);
            $sheet->setCellValue('J' . $row, $rekap->pekerjaan);
            $sheet->setCellValue('K' . $row, $rekap->phone);
            $sheet->setCellValue('L' . $row, $rekap->rt);
            $sheet->setCellValue('M' . $row, $rekap->rw);
            $sheet->setCellValue('N' . $row, $rekap->status_perkawinan);
            $sheet->setCellValue('O' . $row, $rekap->usia);
            $sheet->setCellValue('P' . $row, $rekap->kode_kec);
            $sheet->setCellValue('Q' . $row, $rekap->kode_kel);
            $sheet->setCellValue('R' . $row, $rekap->date_of_death);
            $sheet->setCellValue('S' . $row, $rekap->disabilitas);
            $sheet->setCellValue('T' . $row, $rekap->is_dead);
            $sheet->setCellValue('U' . $row, $rekap->is_move);
            $sheet->setCellValue('V' . $row, $rekap->keterangan);

            $row++;
        }

        // Ambil objek kolom terakhir yang memiliki data (A, B, C, dst.)
        $lastColumn = $sheet->getHighestDataColumn();

        // Iterate melalui kolom-kolom yang memiliki data dan atur lebar kolomnya
        foreach (range('A', $lastColumn) as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Menerapkan style alignment untuk seluruh sel dalam spreadsheet
        $sheet->getStyle('A1:' . $lastColumn . $row)->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        // Memberikan border ke seluruh sel di kolom
        $sheet->getStyle('A3:' . 'I' . ($row - 1))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);

        $excelFileName = 'laporan_data_kepemudaan' . '.xlsx';
        $excelFilePath = public_path($excelFileName);
        $writer = new Xlsx($spreadsheet);
        $writer->save($excelFilePath);

        // Kembalikan response dengan file PDF yang diunduh
        return response()->download(public_path($excelFileName));
    }
}
