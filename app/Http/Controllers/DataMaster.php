<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DataMaster extends BaseController
{
    public function data_master()
    {
        $data = DB::table('citizens')->value(DB::raw('count(*)'));
        return $this->sendResponse($data, 'Fetch Data Success');
    }

    public function jenis_generasi()
    {
        // Gunakan query aggregasi langsung di database untuk menghitung jumlah generasi dan jenis kelamin
        $dataCount = DB::table('citizens')
            ->selectRaw('
            COUNT(CASE WHEN usia >= 0 AND usia <= 10 THEN 1 END) AS jumlahGenAlpha,
            COUNT(CASE WHEN usia >= 11 AND usia <= 23 AND jenis_kelamin = "L" THEN 1 END) AS jumlahGenZL,
            COUNT(CASE WHEN usia >= 11 AND usia <= 23 AND jenis_kelamin = "P" THEN 1 END) AS jumlahGenZP,
            COUNT(CASE WHEN usia >= 24 AND usia <= 39 AND jenis_kelamin = "L" THEN 1 END) AS jumlahMilenialL,
            COUNT(CASE WHEN usia >= 24 AND usia <= 39 AND jenis_kelamin = "P" THEN 1 END) AS jumlahMilenialP,
            COUNT(CASE WHEN usia >= 40 AND usia <= 50 THEN 1 END) AS jumlahGenX,
            COUNT(CASE WHEN jenis_kelamin = "L" THEN 1 END) AS jenisKelaminL,
            COUNT(CASE WHEN jenis_kelamin = "P" THEN 1 END) AS jenisKelaminP
        ')
            ->first();
        $dataCount->kelahiran0sampai10 = $dataCount->jumlahGenAlpha;
        $dataCount->kelahiran11sampai23 = $dataCount->jumlahGenZL + $dataCount->jumlahGenZP;
        $dataCount->kelahiran24sampai39 = $dataCount->jumlahMilenialL + $dataCount->jumlahMilenialP;
        $dataCount->kelahiran40sampai50 = $dataCount->jumlahGenX;

        // dd($dataCount);
        return $this->sendResponse($dataCount, 'Fetch Data Success');
    }

    public function pekerjaan()
    {
        $dataCount = DB::table('citizens')
            ->selectRaw('
            COUNT(CASE WHEN pekerjaan = "PELAJAR/MAHASISWA" THEN 1 END) AS pelajar,
            COUNT(CASE WHEN pekerjaan = "BELUM/TIDAK BEKERJA" THEN 1 END) AS belumBekerja,
            COUNT(CASE WHEN pekerjaan = "MENGURUS RUMAH TANGGA" THEN 1 END) AS irt,
            COUNT(CASE WHEN pekerjaan = "WIRASWASTA" THEN 1 END) AS wirausaha,
            COUNT(CASE WHEN pekerjaan = "KARYAWAN SWASTA" THEN 1 END) AS karyawan,
            COUNT(CASE WHEN pekerjaan IS NULL THEN 1 END) AS belumTerindentifikasi
        ')
            ->first();
        return $this->sendResponse($dataCount, 'Fetch Data Success');
    }

    public function status()
    {
        $dataCount = DB::table('citizens')
            ->selectRaw('
            COUNT(CASE WHEN status_perkawinan = "BELUM KAWIN" THEN 1 END) AS belumKawin,
            COUNT(CASE WHEN status_perkawinan = "KAWIN" THEN 1 END) AS kawin,
            COUNT(CASE WHEN status_perkawinan = "B" THEN 1 END) AS belumTerindentifikasi,

            SUM(CASE WHEN jenis_kelamin = "L" AND status_perkawinan = "BELUM KAWIN" THEN 1 ELSE 0 END) AS belumKawinL,
            SUM(CASE WHEN jenis_kelamin = "L" AND status_perkawinan = "KAWIN" THEN 1 ELSE 0 END) AS kawinL,
            SUM(CASE WHEN jenis_kelamin = "L" AND status_perkawinan = "B" THEN 1 ELSE 0 END) AS belumTerindentifikasiL,
            SUM(CASE WHEN jenis_kelamin = "P" AND status_perkawinan = "BELUM KAWIN" THEN 1 ELSE 0 END) AS belumKawinP,
            SUM(CASE WHEN jenis_kelamin = "P" AND status_perkawinan = "KAWIN" THEN 1 ELSE 0 END) AS kawinP,
            SUM(CASE WHEN jenis_kelamin = "P" AND status_perkawinan = "B" THEN 1 ELSE 0 END) AS belumTerindentifikasiP
        ')
            ->first();
        return $this->sendResponse($dataCount, 'Fetch Data Success');
    }

    public function kecamatan()
    {
        $dataCount = DB::table('citizens')
            ->selectRaw('
            COUNT(CASE WHEN kode_kec = "737101" THEN 1 END) AS a,
            COUNT(CASE WHEN kode_kec = "737102" THEN 1 END) AS b,
            COUNT(CASE WHEN kode_kec = "737103" THEN 1 END) AS c,
            COUNT(CASE WHEN kode_kec = "737104" THEN 1 END) AS d,
            COUNT(CASE WHEN kode_kec = "737105" THEN 1 END) AS e,
            COUNT(CASE WHEN kode_kec = "737106" THEN 1 END) AS f,
            COUNT(CASE WHEN kode_kec = "737107" THEN 1 END) AS g,
            COUNT(CASE WHEN kode_kec = "737108" THEN 1 END) AS h,
            COUNT(CASE WHEN kode_kec = "737109" THEN 1 END) AS i,
            COUNT(CASE WHEN kode_kec = "737110" THEN 1 END) AS j,
            COUNT(CASE WHEN kode_kec = "737111" THEN 1 END) AS k,
            COUNT(CASE WHEN kode_kec = "737112" THEN 1 END) AS l,
            COUNT(CASE WHEN kode_kec = "737113" THEN 1 END) AS m,
            COUNT(CASE WHEN kode_kec = "737114" THEN 1 END) AS n
        ')
            ->first();
        return $this->sendResponse($dataCount, 'Fetch Data Success');
    }
}
